<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::orderBy('id','desc')->get();
        return $categories;
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $category = Category::create([
            'name' => $request->name,
        ]);
        return $category;
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);
        $category->update([
            'name' => $request->name,
        ]);
        return $category;
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        return $category;
    }
}
