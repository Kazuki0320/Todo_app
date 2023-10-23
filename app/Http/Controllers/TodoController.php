<?php

namespace App\Http\Controllers;

use Database\Seeders\TodosTableSeeder;
use Illuminate\Http\Request;
use App\Models\Todo;


class TodoController extends Controller
{
    //todo作成
    public function create()
    {
        $todoCreated = Todo::factory()->create();

        return response()->json($todoCreated);
    }

    # 全件取得
    public function index()
    {
        $todos = Todo::all();

        return response()->json($todos);
    }

    # todo削除
    public function todoDelete($id)
    {
        $todo = Todo::find($id);
        if ($todo) {
            $todoDeleted = $todo->delete();
            return response()->json($todoDeleted);
        } else {
            return response()->json(['error' => 'Todo not found'], 404);
        }
    }

    # todo編集
    public function todoUpdate($id)
    {
        $todo = Todo::find($id);
        if (!$todo) {
            return response()->json(['error' => 'Todo not found'], 404);
        }

        $todo->toArray();

        $todo->update([
            'title' => 'New Todo',
            'status' => 'aaa',
        ]);

        $newTodo = $todo->toArray();

        return response()->json($newTodo);
    }
}

