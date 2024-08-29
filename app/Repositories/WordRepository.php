<?php

namespace App\Repositories;

use App\Models\Word;

class WordRepository extends Repository {

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Word());
    }

    public function getRows() { return $this->rows; }

    public function getRandomWord() {
        $words = $this->selectAll();
        return $words->random();
    }

    public function findWordsByCategoryId($categoryId)
    {
      return Word::where('category_id', $categoryId)->get();
    }
}
