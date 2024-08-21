<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;

class WordPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return PermissionController::isAuthorized('word.index');
    }

    public function create(){
        return PermissionController::isAuthorized('word.create');
    }

    public function edit(){
        return PermissionController::isAuthorized('word.edit');
    }

    public function show(){
        return PermissionController::isAuthorized('word.show');
    }

    public function destroy(){
        return PermissionController::isAuthorized('word.destroy');
    }
}
