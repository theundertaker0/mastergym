<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutineController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\TrainingController;

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
    return view('welcome');
});

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::prefix('admin')->group(function (){
    Route::name('admin.')->group(function (){
        Route::resource('exercises', ExerciseController::class);
        Route::get('exercises/download/{id}',[ExerciseController::class, 'download'])->name('exercises.download');
        Route::get('routines/download/{id}',[RoutineController::class,'download'])->name('routines.download');
        Route::resource('routines', RoutineController::class);
        Route::resource('trainings',TrainingController::class);
        Route::get('trainings/download/{id}',[TrainingController::class,'download'])->name('trainings.download');
    });
});

