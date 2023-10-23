<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TodosTableSeeder extends Seeder
{
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');
        DB::table('todos')->insert([
            [
                'id' => $faker->id,
                'title' => $faker->title,
                'status' => $faker->status,
                'created_at' => $faker->created_at,
            ],
        ]);
    }
}
