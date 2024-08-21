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
                'name' => 'Objetos',
                'url' => 'undefined'
            ],
            [
                'name' => 'Animais',
                'url' => 'undefined'
            ],
            [
                'name' => 'Personagens de Contos de Fadas',
                'url' => 'undefined'
            ],
            [
                'name' => 'Termos Científicos',
                'url' => 'undefined'
            ],
            [
                'name' => 'Mitologia Grega',
                'url' => 'undefined'
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
