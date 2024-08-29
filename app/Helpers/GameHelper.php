<?php

namespace App\Helpers;

use App\Models\Game;

class GameHelper
{
    public static function verifyGameStatus(Game $game)
    {
        $word = self::removeAccents($game->word->name);
        $lettersGuessed = str_split($game->typed_word);
        $wordArray = str_split($word);

        $allLettersGuessed = true;

        foreach ($wordArray as $letter) {
            if (!in_array($letter, $lettersGuessed)) {
                $allLettersGuessed = false;  // Ainda há letras para adivinhar
            }
        }

        if ($allLettersGuessed) {
            $game->status = 'GANHOU';
        } elseif ($game->attempts >= 7) {
            $game->status = 'PERDEU';
        }

        return $game;
    }

    public static function removeAccents(string $word)
    {
        $word = mb_strtolower($word, 'UTF-8');

        $withAccent = ['á', 'à', 'â', 'ã', 'ä', 'é', 'è', 'ê', 'ë', 'í', 'ì', 'î', 'ï', 'ó', 'ò', 'ô', 'õ', 'ö', 'ú', 'ù', 'û', 'ü'];
        $withoutAccent = ['a', 'a', 'a', 'a', 'a', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u'];

        return str_replace($withAccent, $withoutAccent, $word);
    }
}
