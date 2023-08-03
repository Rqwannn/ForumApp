<?php

use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\Feed\FeedController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::group(["middleware" => "auth:sanctum"], function () {
    Route::get('/feeds', [FeedController::class, 'index']);
    Route::post('/feed/store', [FeedController::class, 'store']);
    Route::post('/feed/like/{feed_id}', [FeedController::class, 'likePost']);
    Route::post('/feed/comment/{feed_id}', [FeedController::class, 'comment']);
    Route::get('/feed/comments/{feed_id}', [FeedController::class, 'getComments']);

    // Route::resource('feed', FeedController::class);
});

Route::get('/test', function () {
    return response([
        'message' => 'Api is working'
    ], 200);
});

Route::post('register', [AuthenticationController::class, 'register']);
Route::post('login', [AuthenticationController::class, 'login']);