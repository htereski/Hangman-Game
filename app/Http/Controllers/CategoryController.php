<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $this->authorize('index', Category::class);
    }

    public function create()
    {
        $this->authorize('create', Category::class);
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);
    }

    public function show(string $id)
    {
        $this->authorize('show', Category::class);
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Category::class);
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Category::class);
    }

    public function destroy(string $id)
    {
        $this->authorize('destroy', Category::class);
    }
}
