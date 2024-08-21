<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{

    public function index()
    {
        $this->authorize('index', Game::class);
    }

    public function create()
    {
        $this->authorize('create', Game::class);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Game::class);
    }

    public function show(string $id)
    {
        $this->authorize('show', Game::class);
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Game::class);
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Game::class);
    }

    public function destroy(string $id)
    {
        $this->authorize('destory', Game::class);
    }
}
