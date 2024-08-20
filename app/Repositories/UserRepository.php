<?php 

namespace App\Repositories;

use App\Models\User;

class UserRepository extends Repository { 

    protected $rows = 6;

    public function __construct() {
        parent::__construct(new User());
    }  
    
    public function getRows() { return $this->rows; }

}