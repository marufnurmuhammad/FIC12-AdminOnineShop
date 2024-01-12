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
        $request->validate([
            'category_name' => 'required',
            'category_image' => 'required|image|mimes:png,jpg,jpeg'
        ]);

        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/category', $filename);
        $data = $request->all();

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_image = $filename;
        $category->save();

        return redirect()->route('category.index');
    }
}