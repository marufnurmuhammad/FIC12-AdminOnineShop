<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //index
    public function index()
    {
        #get all category with pagination
        $categories = Category::paginate(5);
        return view('pages.category.index', compact('categories'));
    }

    //create
    public function create()
    {
        return view('pages.category.create');
    }

    //store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:100',
        ]);

        $category = Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Category created successfully');
    }

    //edit
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('pages.category.edit', compact('category'));
    }

    //update
    public function update(Request $request,$id)
    {
        $validated = $request->validate([
            'category_name' => 'required|max:100',
        ]);
        $category = Category::findOrFail($id);
        $category->update($validated);

        return redirect()->route('category.index')->with('success', 'Category updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Category deleted successfully');
    }
}