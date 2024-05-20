<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StudentController extends Controller
{
    public function index()
    {
        $exams = DB::table('exams')->get();
        return view('dashboard', compact('exams'));
    }

    public function showQuestions($id)
    {
        $questions = DB::table('questions')
            ->where('exam_id', $id)
            ->orderBy('id')
            ->cursorPaginate(3);
//            ->fragment('users');
//        ->appends(['test'=> 'abc', 'fruits'=>'mango']);
        return view('question', compact('questions', 'id'));
    }
    public function storeResponse(Request $request, $id)
    {
//        dd($request->all());
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'option_') === 0) {
                $questionId = substr($key, strlen('option_'));
                DB::table('exam_responses')->insert([
                    'exam_id' => $id,
                    'question_id' => $questionId,
                    'selected_option' => $value,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }

        return redirect()->route('exam.total-score.show', ['id' => $id]);
    }
    public function showTotalScore($id)
    {
        $totalScore = $this->calculateTotalScore($id);
        return view('result', compact('totalScore'));
    }

    public function calculateTotalScore($id)
    {
        $correctAnswers = DB::table('questions')
            ->where('exam_id', $id)
            ->pluck('answer', 'id');
        $selectedOptions = DB::table('exam_responses')
            ->where('exam_id', $id)
            ->pluck('selected_option', 'question_id');
        $totalScore = 0;
        foreach ($correctAnswers as $questionId => $correctAnswer) {
            if (isset($selectedOptions[$questionId]) && $selectedOptions[$questionId] == $correctAnswer) {
                $totalScore++;
            }
        }
        return $totalScore;
    }

}
