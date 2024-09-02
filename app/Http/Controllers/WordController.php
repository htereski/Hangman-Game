<?php

namespace App\Http\Controllers;

use App\Models\Word;
use App\Repositories\WordRepository;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WordController extends Controller
{
    protected $repository;

    function __construct()
    {
        $this->repository = new WordRepository();

        $this->categoryRepository = new CategoryRepository();
    }

    public function index()
    {
      $this->authorize('index', Word::class);

      $words = $this->repository->selectAll();

      return view('word.index', compact('words'));
    }

    public function create()
    {
        $this->authorize('create', Word::class);

        return view('word.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create', Word::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);

        $word = new Word();
        $word->name = $request->name;
        $word->category_id = $request->category_id;

        if ($this->repository->save($word)) {
            return redirect()->route('word.indexByCategory', $word->category_id);
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "word.index");
    }

    public function show(string $id)
    {
        $this->authorize('show', Word::class);

        $word = $this->repository->findById($id);

        if (isset($word)) {
            return view('word.show', compact('word'));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "word.index");
    }

    public function edit(string $id)
    {
        $this->authorize('edit', Word::class);

        $word = $this->repository->findById($id);

        if (isset($word)) {
            return view('word.edit', compact('word'));
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "word.index");
    }

    public function update(Request $request, string $id)
    {
        $this->authorize('edit', Word::class);

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'category_id' => ['required', Rule::exists('categories', 'id')]
        ]);


        $word = $this->repository->findById($id);

        if (isset($word)) {
            $word->name = $request->name;
            $word->category_id = $request->category_id;
            if ($this->repository->save($word)) {
                return redirect('word.index');
            }
        }

        return view('message')
            ->with('type', "danger")
            ->with('titulo', "OPERAÇÃO INVÁLIDA")
            ->with('message', "Não foi possível efetuar o procedimento!")
            ->with('link', "word.index");
    }

    public function destroy(string $id)
  {
      $this->authorize('destroy', Word::class);

      $word = $this->repository->findById($id);

      if(!$word) {
        return view('message')
          ->with('type', "danger")
          ->with('titulo', "OPERAÇÃO INVÁLIDA")
          ->with('message', "Palavra não encontrada!")
          ->with('link', "word.index");
      }

      $category = $this->categoryRepository->findById($word->category_id);

      if($this->repository->delete($id)) {
        return redirect()->route('word.indexByCategory', $category->id);
      }

      return view('message')
        ->with('type', "danger")
        ->with('titulo', "OPERAÇÃO INVÁLIDA")
        ->with('message', "Não foi possível efetuar o procedimento!")
        ->with('link', "word.index");
  }

  public function indexByCategory($categoryId)
  {
    $this->authorize('index', Word::class);

    $words = $this->repository->findWordsByCategoryId($categoryId);
    $category = $this->categoryRepository->findById($categoryId);

    return view('word.index', compact('words', 'category'));
  }
}
