<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //index
    public function index(Request $request)
    {
        //get product get all or search by category_id
        $products = Product::when($request->category_id, function ($query) use ($request) {
            return $query->where('category_id', $request->category_id);
        })->paginate(10);
        return response()->json([
            'message' => 'Success',
            'data' => $products
        ], 200);
    }
}