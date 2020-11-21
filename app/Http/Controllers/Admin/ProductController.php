<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
    $products = Product::orderBy('id','desc')->get();
    return $products;
    }

    public function store(ProductRequest $request)
    {
        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return $product;
    }

    public function show($id)
    {
        $product = Product::find($id);
        return $product;
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $product->update([
            'title' => $request->title,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return $product;
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return $product;
    }
}
