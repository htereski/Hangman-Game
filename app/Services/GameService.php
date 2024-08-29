<?php

namespace App\Services;

use App\Models\Game;

interface GameService
{
    public function insertLetter(Game $game, string $letter);
}
