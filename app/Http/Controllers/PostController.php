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
        return PostResource::collection($posts->loadMissing('comments:id,post_id,user_id,comments_content'));
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        // return response()
        //         ->json(['data' => $post]);
        return new PostResource($post->loadMissing('comments:id,post_id,user_id,comments_content'));
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

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|max:200',
            'news_content' => 'required',
        ]);

        $post = Post::findOrFail($id);
        $post->update($validated);

        return new PostDetailResource($post);
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
