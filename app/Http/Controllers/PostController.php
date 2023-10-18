<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Todo;

class PostController extends Controller
{
    //todo作成
    public function create()
    {
        Todo::create([
            'title' => 'testTitle',
        ]);
    }

    # 全件取得
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    # todo削除
    public function todoDelete($id)
    {
        $todo = Todo::find($id);
        $todoDeleted = $todo->delete();

        return response()->json($todoDeleted);
    }

    # todo編集
    public function todoUpdate($id)
    {
        $todoUpdate = Todo::find($id)->update();

        return response()->json($todoUpdate);
    }
}
