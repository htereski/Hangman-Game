<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'category.index'
            ],
            [
                'name' => 'category.show',
            ],
            [
                'name' => 'category.create',
            ],
            [
                'name' => 'category.edit'
            ],
            [
                'name' => 'category.destroy'
            ],
            [
                'name' => 'word.index'
            ],
            [
                'name' => 'word.show'
            ],
            [
                'name' => 'word.create'
            ],
            [
                'name' => 'word.edit'
            ],
            [
                'name' => 'word.destroy'
            ],
            [
                'name' => 'game.index'
            ],
            [
                'name' => 'game.show'
            ],
            [
                'name' => 'game.create'
            ],
            [
                'name' => 'game.edit'
            ],
            [
                'name' => 'game.destroy'
            ],
        ];

        DB::table('resources')->insert($data);
    }
}
