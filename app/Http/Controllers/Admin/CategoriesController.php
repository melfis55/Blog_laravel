<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {

       $categories = Category::all();

       return view('Admin.categories.index', ['categories' => $categories]);
    }

    public function create()
    {
        return view('Admin.categories.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        return view('Admin.categories.edit', ['category' => $category]);
    }

    public function update(Request $request,$id)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);

        $category = Category::find($id);

        $category->update($request->all());

        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        Category::find($id)->delete();

        return redirect()->route('categories.index');
    }
}
