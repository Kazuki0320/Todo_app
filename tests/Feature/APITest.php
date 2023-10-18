<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\Todo;
use Tests\TestCase;

class APITest extends TestCase
{
    use DatabaseTransactions;
    private $todo;

    public function setUp() :void
    {
        parent::setUp();

        $this->todo = Todo::factory()->create();
    }
    public function test_todo作成(): void
    {
		$response = $this->postJson('/todos');
		$response->assertStatus(200);
    }

    public function test_todo表示(): void
    {
        $response = $this->getJson('/posts');
        $response->assertStatus(200);
    }

    public function test_todo削除(): void
    {
        $response = $this->deleteJson("/todoDeleted/{$this->todo->id}");
        $response->assertStatus(200);
    }

    public function test_todo編集(): void
    {
        $response = $this->patchJson("/todoUpdate/{$this->todo->id}", [
            "title" => "AAA",
        ]);
        $response->assertStatus(200);

        // データベースに変更が反映されているか確認
        $this->assertDatabaseHas('todos', [
            'id' => $this->todo->id,
            'title' => $this->todo->title,
        ]);
    }

}
