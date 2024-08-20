<?php 

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new Category());
    }   

    public function getRows() { return $this->rows; }
}