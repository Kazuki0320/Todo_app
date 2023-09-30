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

Route::get('/', function () {
    return view('app');
});
# 投稿一覧表示
Route::get('/posts', [PostController::class, 'index']);

// Route::middleware(['middleware' => 'api'])->group(function () {
//     # 投稿作成
//     Route::post('/posts/create', [PostController::class, 'create']);
//     // Route::post('/posts/create', 'PostController@create');
//     # 投稿一覧表示
//     Route::get('/posts', 'PostController@index');
//     # 投稿表示
//     Route::get('/posts/{id}', 'PostController@show');
//     # 投稿編集
//     Route::patch('/posts/update/{id}' , 'PostController@update');
//     # 投稿削除
//     Route::delete('/posts/{id}', 'PostController@delete');
// });
