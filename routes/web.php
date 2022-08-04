<?php

use App\Events\NuevoMensaje;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\ContinuingEducationController;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\MessagesController;
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
    
    Route::post('/imprimir_encuesta', [QuestionsController::class, 'export'])->name('encuesta.imprimir');
    Route::get('/doc_encuesta', [QuestionsController::class, 'seePDF'])->name('doc.encuesta');
    Route::post('/chart_to_image', [QuestionsController::class, 'exportImage'])->name('exportImage');
    
    Route::post('/answer_update', [AnswersController::class, 'update'])->name('answers.update');
    
    Route::get('/studens',[UsersController::class, 'indexStudents'])->name('studens');
    Route::get('/graduates',[UsersController::class, 'indexGraduates'])->name('graduates');

    Route::get('/jobs',[JobsController::class,'index'])->name('jobs.index'); 
    Route::get('/jobs/create',[JobsController::class,'create'])->name('jobs.create');
    Route::post('/jobs/crear',[JobsController::class,'store'])->name('jobs.store');
    Route::get('/jobs/show/{jobs}',[JobsController::class,'show'])->name('jobs.show');
    Route::get('/jobs/editar/{jobs}',[JobsController::class,'edit'])->name('jobs.edit');
    Route::put('/jobs/{jobs}',[JobsController::class,'update'])->name('jobs.update');
    Route::get('/jobs/eliminar/{jobs}',[JobsController::class,'destroy'])->name('jobs.destroy');
    
    Route::get('/activity',[ActivityController::class,'index'])->name('activity.index'); 
    Route::get('/activity/create',[ActivityController::class,'create'])->name('activity.create');
    Route::post('/activity/crear',[ActivityController::class,'store'])->name('activity.store');
    Route::get('/activity/show/{activity}',[ActivityController::class,'show'])->name('activity.show');
    Route::get('/activity/editar/{activity}',[ActivityController::class,'edit'])->name('activity.edit');
    Route::put('/activity/{activity}',[ActivityController::class,'update'])->name('activity.update');
    Route::get('/activity/eliminar/{activity}',[ActivityController::class,'destroy'])->name('activity.destroy');

    Route::get('/continuingEducation',[ContinuingEducationController::class,'index'])->name('education.index'); 
    Route::get('/continuingEducation/create',[ContinuingEducationController::class,'create'])->name('education.create');
    Route::post('/continuingEducation/crear',[ContinuingEducationController::class,'store'])->name('education.store');
    Route::get('/continuingEducation/show/{continuingEducation}',[ContinuingEducationController::class,'show'])->name('education.show');
    Route::get('/continuingEducation/editar/{continuingEducation}',[ContinuingEducationController::class,'edit'])->name('education.edit');
    Route::put('/continuingEducation/{continuingEducation}',[ContinuingEducationController::class,'update'])->name('education.update');
    Route::get('/continuingEducation/eliminar/{continuingEducation}',[ContinuingEducationController::class,'destroy'])->name('education.destroy');

    Route::get('/messages',[MessagesController::class,'index'])->name('messages.index');
    Route::get('/messages/admin',[MessagesController::class,'admindChat'])->name('admindChat');
    Route::get('/messages/admin/data/{id}/{name}',[MessagesController::class,'redirect'])->name('reenvio');
});

