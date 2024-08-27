<?php

namespace App\Services;

use App\Helpers\GameHelper;
use App\Models\Game;

class GameServiceImpl implements GameService
{
    public function insertLetter(Game $game, string $letter)
    {
        $word = $game->word->name;

        if ($game->status !== 'JOGANDO') {
            return ['status' => 'error', 'message' => 'O jogo já foi finalizado.'];
        }

        if (strpos($game->typed_word, $letter) !== false) {
            return ['status' => 'error', 'message' => 'Você já tentou essa letra.'];
        }

        $game->typed_word .= $letter;

        if (strpos($word, $letter) === false) {
            $game->attempts += 1;
        }

        $game = GameHelper::verifyGameStatus($game);
        $game->save();

        return ['status' => 'success', 'game' => $game];
    }
}
