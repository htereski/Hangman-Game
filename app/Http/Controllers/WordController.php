<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class WordController extends Controller
{
    public function index()
    {
        $this->authorize('index', Word::class);
    }

    public function create()
    {
        $this->authorize('create', Word::class);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Word::class);
    }

    public function show(string $id)
    {
        $this->authorize('show', Word::class);
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Word::class);
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Word::class);
    }

    public function destroy(string $id)
    {
        $this->authorize('destroy', Word::class);
    }
}
