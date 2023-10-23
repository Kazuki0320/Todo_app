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
        $this->assertDatabaseHas('todos', [
            'title' => $this->todo->title,
            'status' => $this->todo->status,
            'created_at' => $this->todo->created_at,
            'updated_at' => $this->todo->updated_at
        ]);

		$response = $this->postJson('/todosCreated');
		$response->assertStatus(200);

        $response->assertJsonStructure([
            'title',
            'status',
            'created_at',
            'updated_at',
            'id'
        ]);
    }

    public function test_todo表示(): void
    {
        $response = $this->getJson('/todos');
        $response->assertStatus(200);

        $response->assertJsonStructure([
            '*' => ['title', 'status', 'id','created_at','updated_at'],
        ]);

        $response->assertJsonFragment([
            'title'=> $this->todo->title,
            'status' => $this->todo->status,
            'created_at'=> $this->todo->created_at,
            'updated_at'=> $this->todo->updated_at
        ]);
    }

    public function test_todo削除(): void
    {
        $nonExistedId = 9999;
        $response = $this->deleteJson("/todoDeleted/{$nonExistedId}");

        $response->assertStatus(404);

        $response = $this->deleteJson("/todoDeleted/{$this->todo->id}");
        $response->assertStatus(200);

        $this->assertDatabaseMissing('todos', ['id' => $this->todo->id]);
    }

    public function test_todo編集(): void
    {
        $response = $this->patchJson("/todoUpdate/{$this->todo->id}", [
            'title' => 'New Todo',
            'status' => 'aaa',
        ]);

        $response->assertStatus(200)
                ->assertJsonStructure([
                    'id',
                    'title',
                    'status',
                    'created_at',
                    'updated_at',
                ]);

        $response = $this->patchJson('/todoUpdate/9999', [
            "title" => "Invalid Title",
            "status" => "invalid",
        ]);

        $response->assertStatus(404)
                ->assertJson(['error' => 'Todo not found']);

        $editedData = todo::find($this->todo->id)->toArray();
        $this->assertEquals($editedData['title'], 'New Todo');
        $this->assertEquals($editedData['status'],'aaa');
    }
}
