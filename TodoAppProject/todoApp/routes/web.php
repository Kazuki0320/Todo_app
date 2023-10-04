<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['middleware' => 'web'])->group(function () {
    //todo作成
    Route::get('/todo', [PostController::class, 'create']);
    //todo一覧表示
    Route::post('/posts', [PostController::class, 'index']);
    //todo削除
    Route::get('/todoDelete',  [PostController::class, 'todoDelete']);
    Route::delete('/todoDelete', [PostController::class, 'todoDelete']);
    //todo編集
    Route::get('/todoUpdate', [PostController::class, 'todoUpdate']);
    Route::patch('/todoUpdate', [PostController::class, 'todoUpdate']);
});
