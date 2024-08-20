<?php 

namespace App\Repositories;

use App\Models\Game;

class GameRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Game());
    }   

    public function getRows() { return $this->rows; }
}