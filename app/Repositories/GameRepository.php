<?php

namespace App\Repositories;

use App\Models\Game;
use App\Models\Word;
use Exception;
use Illuminate\Support\Facades\Auth;

class GameRepository extends Repository
{

    protected $rows = 6;

    public function __construct()
    {
        parent::__construct(new Game());
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function newGame()
    {
        try {
            $word = Word::inRandomOrder()->first();
            $game = new Game();
            $game->word_id = $word->id;
            $game->user_id = Auth::user()->id;
            $game->typed_word = '';
            $game->attempts = 0;
            $game->status = 'JOGANDO';
            $game->save();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}
