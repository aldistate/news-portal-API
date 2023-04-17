<?php

use App\Http\Controllers\AuthController;
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
  Route::post('/posts', [PostController::class, 'store'])->name('store');
  Route::patch('/posts/{id}', [PostController::class, 'update'])->name('update')->middleware('isAuthor');
  Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('destroy')->middleware('isAuthor');
});

Route::get('/posts', [PostController::class, 'index'])->name('index');
Route::get('/posts/{id}', [PostController::class, 'show'])->name('show');

Route::post('/login', [AuthController::class, 'login'])->name('login');