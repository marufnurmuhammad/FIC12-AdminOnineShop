<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    //index
    public function index()
    {
        #get all product pagiantiaon 5
        $products = Product::paginate(5);
        return view('pages.product.index', compact('products'));
    }

    //create
    public function create()
    {
        #get all category
        $categories = Category::all();
        return view('pages.product.create', compact('categories'));
    }

    //store
    public function store(Request $request)
    {
        $filename = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/products', $filename);
        // $data = $request->all();

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->price = (int) $request->price;
        $product->stock = (int) $request->stock;
        $product->category_id = $request->category_id;
        $product->image = $filename;
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product created successfully');
    }

         //edit
    public function edit($id)
        {
            $product = Product::findOrFail($id);
            $categories = Category::all();
            return view('pages.product.edit', compact('product', 'categories'));
        }

    //update
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        //if product iy, then update the image
        if($request->image){
            $filename = time(). '.' . $request->image->extension();
            $request->image->storeAs('public/products', $filename);
            $product->image = $filename;
        }
        $product->update($request->all());
        return redirect()->route('product.index')->with('success', 'Product updated successfully');
    }

    //destroy
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

}
