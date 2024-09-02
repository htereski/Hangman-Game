<?php

namespace App\Repositories;

use App\Models\Category;
use Exception;
use Illuminate\Http\Request;

class CategoryRepository extends Repository
{

    protected $rows = 6;

    public function __construct()
    {
        parent::__construct(new Category());
    }

    public function getRows()
    {
        return $this->rows;
    }

    public function saveWithImg(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->url = 'undefined';
        $category->id = $this->saveAndReturnId($category);

        if ($request->hasFile('img')) {
            $ext = $request->file('img')->getClientOriginalExtension();
            $nome_arq = $category->id . "_" . time() . "." . $ext;
            $request->file('img')->storeAs("public/", $nome_arq);
            $category->url = "/storage/" . $nome_arq;
        }
        return $this->save($category);
    }

    public function updateWithImg(Request $request, string $id)
    {
        $category = $this->findById($id);

        if (isset($category)) {
            if ($request->hasFile('img')) {
                $category->name = $request->name;

                $ext = $request->file('img')->getClientOriginalExtension();
                $nome_arq = $category->id . "_" . time() . "." . $ext;
                $request->file('img')->storeAs("public/", $nome_arq);
                $category->url = "/storage/" . $nome_arq;

                return $this->save($category);
            }
        }
        return false;
    }
}
