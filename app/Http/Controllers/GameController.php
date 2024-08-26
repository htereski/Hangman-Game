<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Repositories\GameRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GameController extends Controller
{
    protected $repository;

    function __construct()
    {
        $this->repository = new GameRepository();
    }

    public function index()
    {
        $this->authorize('index', Game::class);

        $games = $this->repository->selectAll();

        return view('game.index', compact('games'));
    }

    public function create()
    {
        $this->authorize('create', Game::class);

        return view('game.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Game::class);

        $request->validate([
            'typed_word' => ['required', 'string', 'max:255'],
            'attempts' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'word_id' => ['required', Rule::exists('words', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')]
        ]);

        if ($this->repository->save($request)) {
            return redirect('game.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "game.index");
    }

    public function show(string $id)
    {
        $this->authorize('show', Game::class);

        $game = $this->repository->findById($id);

        if (isset($game)) {
            return view('game.show', compact('game'));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "game.index");
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Game::class);

        $game = $this->repository->findById($id);

        if (isset($game)) {
            return view('game.edit', compact('game'));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "game.index");
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Game::class);

        $request->validate([
            'typed_word' => ['required', 'string', 'max:255'],
            'attempts' => ['required', 'string', 'max:255'],
            'status' => ['required', 'string', 'max:255'],
            'word_id' => ['required', Rule::exists('words', 'id')],
            'user_id' => ['required', Rule::exists('users', 'id')]
        ]);

        if ($this->repository->save($request)) {
            return redirect('game.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "game.index");
    }

    public function destroy(string $id)
    {
        $this->authorize('destroy', Game::class);

        if ($this->repository->delete($id)) {
            return redirect('game.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "game.index");
    }
}
