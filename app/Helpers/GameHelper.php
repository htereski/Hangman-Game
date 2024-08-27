<?php

namespace App\Helpers;

use App\Models\Game;

class GameHelper
{
    public static function verifyGameStatus(Game $game)
    {
        $word = $game->word->name;
        $typedLetters = str_split($game->typed_word);

        $allLettersGuessed = true;
        foreach (str_split($word) as $letter) {
            if (!in_array($letter, $typedLetters)) {
                $allLettersGuessed = false;
                break;
            }
        }

        if ($allLettersGuessed) {
            $game->status = 'GANHOU';
        } elseif ($game->attempts >= 7) {
            $game->status = 'PERDEU';
        }

        return $game;
    }
}
