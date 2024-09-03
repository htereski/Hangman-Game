<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Repositories\WordRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    protected $repository;
    protected $wordRepository;

    public function __construct()
    {
        $this->repository = new CategoryRepository();

        $this->wordRepository = new WordRepository();
    }

    public function index()
    {
        $this->authorize('index', Category::class);

        $categories = $this->repository->selectAll();

        return view('category.index', compact('categories'));
    }

    public function create()
    {
        $this->authorize('create', Category::class);

        return view('category.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Category::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'img' => ['required', 'file']
        ]);

        if ($this->repository->saveWithImg($request)) {
            return redirect()->route('category.index');
        }

        return view('message');
    }

    public function show(string $id)
    {
        $this->authorize('show', Category::class);

        $category = $this->repository->findById($id);

        if (isset($category)) {
            return view('category.show', compact(['category']));
        }

        return view('message');
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Category::class);

        $category = $this->repository->findById($id);

        if (isset($category)) {
            return view('category.edit', compact(['category']));
        }

        return view('message');
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Category::class);

        $rules = [
            'name' => ['required', 'string', 'max:255'],
        ];

        if ($request->hasFile('img')) {
            $rules['img'] = ['required', 'file'];
        }

        $request->validate($rules);

        if ($request->hasFile('img')) {
            if ($this->repository->updateWithImg($request, $id)) {
                return redirect()->route('category.index');
            }
        } else {
            if ($this->repository->updateWithoutImg($request, $id)) {
                return redirect()->route('category.index');
            }
        }

        return view('message');
    }


    public function destroy(string $id)
    {
        $this->authorize('destroy', Category::class);
        
        $this->wordRepository->deleteAllWordsByCategoryId($id);

        if ($this->repository->delete($id)) {
            return redirect()->route('category.index');
        }

        return view('message');
    }
}
