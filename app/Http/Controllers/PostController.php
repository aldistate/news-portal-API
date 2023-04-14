<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        // return response()
        //         ->json(['data' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        // return response()
        //         ->json(['data' => $post]);
        return new PostDetailResource($post);
    }

    public function store(Request $request)
    {
        $auth = Auth::user()->id;

        $request->validate([
            'title' => 'required|max:200',
            'news_content' => 'required',
        ]);

        $request['author'] = $auth;
        $post = Post::create($request->all());
        return new PostDetailResource($post);
    }
}
