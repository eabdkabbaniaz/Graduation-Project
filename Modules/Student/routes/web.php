<?php

use Illuminate\Support\Facades\Route;
use Modules\Student\App\Http\Controllers\StudentController;

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

Route::group([], function () {
 //   Route::resource('student', StudentController::class)->names('student');
});

// Route::get('/import-form', [StudentController::class, 'showImportForm'])->name('import.form');
// Route::post('/import-students', [StudentController::class, 'import'])->name('import.students');
