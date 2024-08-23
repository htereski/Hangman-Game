<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;

    public function __construct()
    {
        $this->repository = new CategoryRepository();
    }

    public function index()
    {
        $this->authorize('index', Category::class);

        $categories = $this->repository->selectAll();

        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        return view('categories.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['required', 'file']
        ]);

        if ($this->repository->saveWithImg($request)) {
            return redirect('categories.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "categories.index");
    }

    public function show(string $id)
    {
        $this->authorize('show', Category::class);

        $category = $this->repository->findById($id);

        if (isset($category)) {
            return view('categories.show', compact(['category']));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "categories.index");
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Category::class);

        $category = $this->repository->findById($id);

        if (isset($category)) {
            return view('categories.edit', compact(['category']));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "categories.index");
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Category::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['required', 'file']
        ]);

        if ($this->repository->updateWithImg($request, $id)) {
            return redirect('categories.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "categories.index");
    }

    public function destroy(string $id)
    {
        $this->authorize('destroy', Category::class);

        if ($this->repository->delete($id)) {
            return redirect('categories.index');
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "categories.index");
    }
}
