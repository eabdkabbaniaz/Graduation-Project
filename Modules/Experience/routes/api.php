<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Experience\App\Http\Controllers\ExperienceController;

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
    Route::get('experience', fn (Request $request) => $request->user())->name('experience');
});


Route::group(['prefix' => 'Experinence'],function(){
    Route::get('/index', [ExperienceController::class, 'index']);
    Route::get('/show/{id}', [ExperienceController::class, 'show']);
    Route::post('/create', [ExperienceController::class, 'create']);
    Route::delete('/destroy/{id}', [ExperienceController::class, 'destroy']);
    Route::patch('/update/{id}', [ExperienceController::class, 'update']);
    Route::get('/changeStatus/{id}', [ExperienceController::class, 'changeStatus']);
});
