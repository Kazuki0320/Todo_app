<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Todo;

use Illuminate\Support\Facades\Log;
class PostController extends Controller
{
    //todo作成
    public function create()
    {
        $todo = new Todo();

        $todo->create([
            'id' => '1',
            'title' => 'testTitle',
        ]);

        $todo->save();
    }

    # 全件取得
    public function index()
    {
        $posts = Post::all();

        return response()->json($posts);
    }

    # todo削除
    public function todoDelete()
    {
        //ダミーデータ確認
        $todoDeleted = Todo::where('id', 5)->delete();

        return response()->json($todoDeleted);
    }

    # todo編集
    public function todoUpdate()
    {
        //ダミーデータ確認
        $todoUpdate = Todo::where('id', 1)
        ->update(['title' => 'AAA']);

        return response()->json($todoUpdate);
    }
}
