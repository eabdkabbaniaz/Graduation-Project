<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Student\App\Http\Controllers\AuthController;
use Modules\Student\App\Http\Controllers\CategoryController;
use Modules\Student\App\Http\Controllers\StudentAdminController;
use Modules\Student\App\Http\Controllers\StudentController;
use Modules\Student\App\Http\Controllers\StudentImportController;
use Modules\Student\App\Http\Controllers\StudentProfileController;

/*
    |--------------------------------------------------------------------------
    | API Routes
    |--------------------------------------------------------------------------
    |
    | Here is where you can register API routes for your application. These
    | routes are loaded by the RouteServiceProvider within a group which
    | is assigned the "api" middleware group. Enjoy building your API!
    |
*/

Route::middleware(['auth:sanctum'])->prefix('v1')->name('api.')->group(function () {
    Route::get('student', fn(Request $request) => $request->user())->name('student');
});



Route::group(['prefix'=>'Auth'],function(){
Route::post('ChangePassword', [AuthController::class, 'ChangePassword'])->middleware('auth:sanctum');
Route::post('/login', [AuthController::class, 'login']);
});

Route::group(['prefix'=>'studentAdmin'],function(){
    Route::get('/index', [StudentAdminController::class, 'index']);
    Route::delete('/destroy/{id}', [StudentAdminController::class, 'destroy']);
    Route::patch('update/{id}', [StudentAdminController::class, 'update']);
    Route::post('create', [StudentAdminController::class, 'create']);
    Route::post('/import-students', [StudentImportController::class, 'import']);
});
Route::group(['prefix' => 'Student'],function(){
    Route::get('show/{message}', [StudentAdminController::class, 'show']);
});
Route::group(['prefix' => 'Category'],function(){
    Route::get('/index', [CategoryController::class, 'index']);
    Route::get('/show/{id}', [CategoryController::class, 'show']);
});
