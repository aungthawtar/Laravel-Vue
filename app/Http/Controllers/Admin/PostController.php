<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with("category")->orderBy('id','desc')->get();
        return $posts;
    }

    public function create()
    {
        return view('admin/post/index');
    }

    public function store(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);
        return $post;
    }

    public function show($id)
    {
        return Post::with("category")->find($id);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);
        return $post;
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return $post;
    }
}
