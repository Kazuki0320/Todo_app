<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //
    # 投稿作成
    public function create(Request $request)
    {
        var_dump("test");
        $post = new Post();
        var_dump("test1");
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        var_dump($post->content);
        var_dump("test3");
        // $post->created_at = now();
        var_dump("test4");
        // $post->updated_at = now();
        var_dump("test5");
        $post->save();
        var_dump("test6");
        
        return null;//response()->json(Post::all());
    }

    # 全件取得
    public function index()
    {
        $posts = Post::all();
        return response()->json($posts);
    }

    # 投稿表示
    public function show(Int $id)
    {
        $post = Post::find($id);
        return response()->json($post);
    }

    # 投稿編集
    public function update(Int $id, Request $request)
    {
        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->updated_at = now();
        $post->save();
        return response()->json($post);
    }

    # 投稿削除
    public function delete(Int $id)
    {
        $post = Post::find($id)->delete();
        return response()->json(Post::all());
    }
}
