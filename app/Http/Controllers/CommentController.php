<?php

namespace App\Http\Controllers;

use App\Http\Resources\CommentResource;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $auth = Auth::user()->id;

        $request->validate([
            'post_id' => 'required|exists:posts,id',
            'comments_content' => 'required'
        ]);

        $request['user_id'] = $auth;
        $comment = Comment::create($request->all());

        return new CommentResource($comment);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'comments_content' => 'required',
        ]);
        
        $comment = Comment::find($id);
        $comment->update($validated);

        return new CommentResource($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'message' => 'data berhasil dihapus'
        ], 200);
    }
}
