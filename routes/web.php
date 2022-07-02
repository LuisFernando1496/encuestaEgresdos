<?php

use App\Http\Controllers\QuestionsController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('login');
});
Route::get('/registro-Egresados', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware'=>['auth:sanctum', 'verified']], function(){
    Route::get('/encuesta', [QuestionsController::class, 'index'])->name('encuesta');
    Route::get('/encuesta_create', [QuestionsController::class, 'create'])->name('encuesta.create');
    Route::post('/encuesta', [QuestionsController::class, 'store'])->name('encuesta.store');
    Route::get('/ver_encuesta', [QuestionsController::class, 'show'])->name('encuesta.show');
    Route::post('/question_update', [QuestionsController::class, 'update'])->name('question.update');
    Route::post('/answer_update', [AnswersController::class, 'update'])->name('answers.update');
    Route::get('/studens',[UsersController::class, 'indexStudents'])->name('studens');
    Route::get('/graduates',[UsersController::class, 'indexGraduates'])->name('graduates');
});
