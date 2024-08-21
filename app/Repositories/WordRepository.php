<?php 

namespace App\Repositories;

use App\Models\Word;

class WordRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Word());
    }   

    public function getRows() { return $this->rows; }
}