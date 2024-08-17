<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Objetos'
            ],
            [
                'name' => 'Animais'
            ],
            [
                'name' => 'Personagens de Contos de Fadas'
            ],
            [
                'name' => 'Termos Científicos'
            ],
            [
                'name' => 'Mitologia Grega'
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
