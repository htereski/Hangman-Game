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
                'url' => 'storage/object.jpg'
            ],
            [
                'name' => 'Animais',
                'url' => 'storage/animals.jpg'
            ],
            [
                'name' => 'Personagens de Contos de Fadas',
                'url' => 'storage/characters.jpg'
            ],
            [
                'name' => 'Termos Científicos',
                'url' => 'storage/scientific.jpg'
            ],
            [
                'name' => 'Mitologia Grega',
                'url' => 'storage/mythology.jpg'
            ],
        ];

        DB::table('categories')->insert($data);
    }
}
