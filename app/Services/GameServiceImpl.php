<?php

namespace App\Services;

use App\Helpers\GameHelper;
use App\Models\Game;

class GameServiceImpl implements GameService
{
    public function insertLetter(Game $game, string $letter)
    {
        $word = GameHelper::removeAccents($game->word->name);
        $normalizedLetter = GameHelper::removeAccents($letter);

        if ($game->status !== 'JOGANDO') {
            return ['status' => 'error', 'message' => 'O jogo já foi finalizado.', 'game' => $game];
        }

        if (strpos($game->typed_word, $normalizedLetter) !== false) {
            return ['status' => 'error', 'message' => 'Você já tentou essa letra.', 'game' => $game];
        }
        $game->typed_word .= $normalizedLetter;

        if (strpos($word, $normalizedLetter) === false) {
            $game->attempts += 1;
        }
        $game = GameHelper::verifyGameStatus($game);
        $game->save();

        return ['status' => 'success', 'game' => $game];
    }
}
