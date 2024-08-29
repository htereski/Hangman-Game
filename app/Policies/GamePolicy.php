<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;

class GamePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return PermissionController::isAuthorized('game.index');
    }

    public function create(){
        return PermissionController::isAuthorized('game.create');
    }

    public function edit(){
        return PermissionController::isAuthorized('game.edit');
    }

    public function show(){
        return PermissionController::isAuthorized('game.show');
    }

    public function destroy(){
        return PermissionController::isAuthorized('game.destroy');
    }
}
