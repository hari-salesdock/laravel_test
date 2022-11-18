<?php

namespace App\Http\Controllers;

use App\Http\Requests\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function store(Post $request)
    {

        $post = new \App\Models\Post();
        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->content = $request->get('content');
        $post->save();

    }

    public function get(Request $request)
    {
        $id = $request->get('id');
        $post = Post::where('id', $id)->firstOrFail();

    }

    public function update(Request $request)
    {
        $id = $request->get('id');
        $post = Post::where('id', $id)->firstOrFail();

        $post->title = $request->get('title');
        $post->slug = $request->get('slug');
        $post->content = $request->get('content');
        $post->save();

    }

    public function delete(Request $request)
    {
        $id = $request->get('id');
        $post = Post::where('id', $id)->firstOrFail();
        $post->delete();
    }
}
