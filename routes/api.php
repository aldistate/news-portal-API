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

Route::get('/posts', [PostController::class, 'index'])->middleware(['auth:sanctum'])->name('index');
Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth:sanctum'])->name('show');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->middleware(['auth:sanctum'])->name('logout');
Route::get('/authCheck', [AuthController::class, 'authCheck'])->middleware(['auth:sanctum'])->name('authCheck');