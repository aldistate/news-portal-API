<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostDetailResource;
use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $results = [];

        foreach($posts as $post) {
            $results[] = [
                'id' => $post->id,
                'title' => $post->title,
                'news_content' => $post->news_content,
                'created_at' => date_format($post->created_at, 'Y-m-d H:i:s'),
            ];
        }
        return $this->jsonRes($results,self::RESPONSE_SUCCESS);
    }

    public function show($id)
    {
        $post = Post::whereId($id)->first();

        if(is_null($post)) return $this->jsonRes(['message' => 'No row found'],self::RESPONSE_ERROR,404);

        $result = [
            'id' => $post->id,
            'author' => 'ditulis oleh ' . $post->user->username,
            'title' => $post->title,
            'news_content' => $post->news_content,
            'created_at' => date_format($post->created_at, 'Y-m-d H:i:s'),
        ];

        return $this->jsonRes($result,self::RESPONSE_SUCCESS);
    }
}
