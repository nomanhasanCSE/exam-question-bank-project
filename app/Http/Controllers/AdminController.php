<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    public function create(){
       return view('admin');
   }

    public function store(Request $request){
//        dd($request->all());
//        $exam =DB::table('exams')
//        ->insert(
//      [
//          'exam_name'=> $request->exam_name,
//          'exam_start_date'=> $request->start_date,
//          'exam_end_date'=> $request->end_date,
//      ]);

        $exam =DB::table('exams')->insertGetId(
            [ 'exam_name' => $request->exam_name, 'exam_start_date' => $request->start_date, 'exam_end_date' => $request->end_date]
        );


//        $question =DB::table('questions')
//            ->insert(
//                [
//                    'exam_id'=> $exam->id,
//                    'question_name'=> 'hg',
//                    'option_a'=> 'hg',
//                    'option_b'=> 'hg',
//                    'option_c'=> 'hg',
//                    'option_d'=> 'hg',
//                    'answer'=> 'hg',
//                ]);

        if ($exam){
            foreach ($request->question_name as $key => $qs_name){
                $question =DB::table('questions')
                    ->insert(
                        [
                            'exam_id' => $exam,
                            'question_name'=> $qs_name,
                            'option_a'=> $request->option_a[$key],
                            'option_b'=> $request->option_b[$key],
                            'option_c'=> $request->option_c[$key],
                            'option_d'=> $request->option_d[$key],
                            'answer'=> $request->answer[$key],
                        ]);
            }

        }
        return redirect()->route('admin.create')->with('success', 'Exam and questions saved successfully!');
    }

//public function store(){
//    $question =DB::table('questions')
//        ->insert(
//            [
//                'question_name'=> "Noman",
//                'option_a'=> "Data",
//                'option_b'=> "science",
//                'option_c'=> "Mining",
//                'option_d'=> "ML",
//                'answer'=>"a",
//            ]);
//}
}
