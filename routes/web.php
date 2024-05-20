<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PractiseController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth','admin']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
//Route::get('/admin/create', [HomeController::class, 'create'])->name('admin.dashboard');

Route::controller(AdminController::class)->group(function(){
    Route::get('/admin/create',  'create')->name('admin.create');
    Route::post('/admin/store',  'store')->name('admin.store');
});

Route::controller(StudentController::class)->group(function(){
    Route::get('/dashboard','index')->name('dashboard');
    Route::get('/exam/{id}/questions', 'showQuestions')->name('exam.questions');
    Route::post('/exam/{id}/response', 'storeResponse')->name('exam.response.store');
    Route::get('/exam/{id}/total-score', 'calculateTotalScore')->name('exam.total-score');
    Route::get('/exam/{id}/total-score/show', 'showTotalScore')->name('exam.total-score.show');

});
Route::controller(PractiseController::class)->group(function(){
    Route::get('/query-practise/add','add')->name('query.practise.add');
    Route::get('/query-practise','index')->name('query.practise');
//    Route::get('/exam/{id}/questions', 'showQuestions')->name('exam.questions');
//    Route::post('/exam/{id}/response', 'storeResponse')->name('exam.response.store');
//    Route::get('/exam/{id}/total-score', 'calculateTotalScore')->name('exam.total-score');
//    Route::get('/exam/{id}/total-score/show', 'showTotalScore')->name('exam.total-score.show');

});



//Route::post('/question/{id}/submit', [StudentController::class, 'submitQuestion'])->name('question.submit');
//Route::get('/result', [StudentController::class, 'showResult'])->name('quiz.result');
//Route::get('/reset-quiz', [StudentController::class, 'resetQuiz'])->name('quiz.reset');
