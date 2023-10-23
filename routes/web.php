<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

Route::middleware(['middleware' => 'web'])->group(function () {
    //todo作成
    Route::post('/todosCreated', [TodoController::class, 'create']);
    //todo一覧表示
    Route::get('/todos', [TodoController::class, 'index']);
    //todo削除
    Route::delete('/todoDeleted/{id}', [TodoController::class, 'todoDelete']);
    //todo編集
    Route::get('/todoUpdate/{id}', [TodoController::class, 'todoUpdate']);
    Route::patch('/todoUpdate/{id}', [TodoController::class, 'todoUpdate']);
});


