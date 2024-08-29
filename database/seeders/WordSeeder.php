<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = DB::table('categories')->get();

        $data = [];

        $wordsByCategory = [
            'Objetos' => [
                'relógio',
                'cadeira',
                'computador',
                'caneta',
                'telefone',
                'lâmpada',
                'espelho',
                'mochila',
                'teclado',
                'quadro'
            ],
            'Animais' => [
                'elefante',
                'girafa',
                'crocodilo',
                'canguru',
                'pinguim',
                'tartaruga',
                'rinoceronte',
                'papagaio',
                'lobo',
                'flamingo'
            ],
            'Personagens de Contos de Fadas' => [
                'cinderela',
                'pinóquio',
                'rapunzel',
                'aladim',
                'branca',
                'bela',
                'peter',
                'joao',
                'chapeu',
                'sininho'
            ],
            'Termos Científicos' => [
                'entropia',
                'homeostase',
                'catalisador',
                'isotopo',
                'eletro',
                'bioluminescencia',
                'quiralidade',
                'fissao',
                'fotossintese',
                'termo'
            ],
            'Mitologia Grega' => [
                'prometeu',
                'orfeu',
                'tantalo',
                'narciso',
                'pandora',
                'quimera',
                'icaro',
                'hecate',
                'hipnos',
                'morfeu'
            ]
        ];
        
        foreach ($categories as $category) {
            if (isset($wordsByCategory[$category->name])) {
                foreach ($wordsByCategory[$category->name] as $word) {
                    $data[] = [
                        'name' => $word,
                        'category_id' => $category->id,
                    ];
                }
            }
        }

        DB::table('words')->insert($data);
    }
}
