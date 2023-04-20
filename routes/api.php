<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
  Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
  Route::get('/authCheck', [AuthController::class, 'authCheck'])->name('authCheck');
  Route::post('/posts', [PostController::class, 'store'])->name('storePost');
  Route::patch('/posts/{id}', [PostController::class, 'update'])->name('updatePost')->middleware('isAuthor');
  Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('destroyPost')->middleware('isAuthor');

  Route::post('/comment', [CommentController::class, 'store'])->name('storeComment');
  Route::patch('/comment/{id}', [CommentController::class, 'update'])->name('updateComment')->middleware('isComment');
  Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('destroyComment')->middleware('isComment');
});

Route::get('/posts', [PostController::class, 'index'])->name('indexPost');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('showPost');

Route::post('/login', [AuthController::class, 'login'])->name('login');