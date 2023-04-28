<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }
        return $randomString;
    }

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
            'foto' => 'file|max:5000|mimes:png,jpg,jpeg'
        ]);

        if ($request->file('foto')) {
            $foto_file = $this->generateRandomString();
            $extension = $request->file('foto')->extension();
            $foto_name = $foto_file . "." . $extension;

            Storage::putFileAs('image', $request->file('foto'), $foto_name);
        }

        $request['image'] = $foto_name;
        $request['author'] = $auth;
        $post = Post::create($request->all());
        return new PostResource($post);
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
