<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FriendshipController;
use App\Http\Controllers\IdeaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\CheckOwnedIdea;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::resource('ideas', IdeaController::class)
        ->middleware(CheckOwnedIdea::class);

    Route::resource('ideas.comments', CommentController::class)->shallow();

    Route::resource('friends', FriendshipController::class);

    Route::post('/logout', [LogoutController::class, 'logout'])->middleware('auth');
});

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
