<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::middleware(['middleware' => 'web'])->group(function () {
    //todo作成
    Route::get('/todos', [PostController::class, 'create']);
    Route::post('/todos', [PostController::class, 'create']);
    //todo一覧表示
    Route::get('/posts', [PostController::class, 'index']);
    Route::post('/posts', [PostController::class, 'index']);
    //todo削除
    Route::get('/todoDeleted/{id}',  [PostController::class, 'todoDelete']);
    Route::delete('/todoDeleted/{id}', [PostController::class, 'todoDelete']);
    //todo編集
    Route::get('/todoUpdate/{id}', [PostController::class, 'todoUpdate']);
    Route::patch('/todoUpdate/{id}', [PostController::class, 'todoUpdate']);
});


