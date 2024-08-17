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
                'Relógio',
                'Cadeira',
                'Computador',
                'Caneta',
                'Telefone',
                'Lâmpada',
                'Espelho',
                'Mochila',
                'Teclado',
                'Quadro'
            ],
            'Animais' => [
                'Elefante',
                'Girafa',
                'Crocodilo',
                'Canguru',
                'Pinguim',
                'Tartaruga',
                'Rinoceronte',
                'Papagaio',
                'Lobo',
                'Flamingo'
            ],
            'Personagens de Contos de Fadas' => [
                'Cinderela',
                'Pinóquio',
                'Rapunzel',
                'Aladim',
                'Branca de Neve',
                'Bela Adormecida',
                'Peter Pan',
                'João e Maria',
                'Chapeuzinho Vermelho',
                'Sininho'
            ],
            'Termos Científicos' => [
                'Entropia',
                'Homeostase',
                'Catalisador',
                'Isótopo',
                'Eletromagnetismo',
                'Bioluminescência',
                'Quiralidade',
                'Fissão Nuclear',
                'Fotossíntese',
                'Termodinâmica'
            ],
            'Mitologia Grega' => [
                'Prometeu',
                'Orfeu',
                'Tântalo',
                'Narciso',
                'Pandora',
                'Quimera',
                'Ícaro',
                'Hécate',
                'Hipnos',
                'Morfeu'
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
