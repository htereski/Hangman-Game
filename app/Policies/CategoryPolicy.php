<?php

namespace App\Policies;

use App\Http\Controllers\PermissionController;
use App\Models\User;

class CategoryPolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function index(){
        return PermissionController::isAuthorized('category.index');
    }

    public function create(){
        return PermissionController::isAuthorized('category.create');
    }

    public function edit(){
        return PermissionController::isAuthorized('category.edit');
    }

    public function show(){
        return PermissionController::isAuthorized('category.show');
    }

    public function destroy(){
        return PermissionController::isAuthorized('category.destroy');
    }
}
