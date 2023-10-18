<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id' => '1',
                'title' => 'title1',
                'status' => '0',
                'created_at' => now(),
                'updated_at'=> now()
            ]
        ];

        DB::table('todos')->insert($data);
    }
}
