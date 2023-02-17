<?php

declare(strict_types=1);

use App\Http\Controllers\Api\v1\RoomController;
use App\Http\Controllers\Api\v1\UserController;
use Illuminate\Support\Facades\Route;

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

Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'getAll');
    Route::get('/users/{user_id}', 'getUser');
});

Route::controller(RoomController::class)->group(function () {
    Route::get('/room/add', 'exportResume');
    Route::get('/resume/{resume_id}', 'getResume');
    Route::post('/resume', 'createResume');
    Route::patch('/resume/{resume_id}', 'updateResume');
    Route::delete('/resume/{resume_id}', 'deleteResume');
});
