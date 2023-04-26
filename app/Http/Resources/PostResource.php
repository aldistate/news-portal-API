<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'author' => $this->user->username,
            'title' => $this->title,
            'news_content' => $this->news_content,
            'created_at' => date_format($this->created_at, 'Y-m-d H:i:s'),
            'comment' => $this->whenLoaded('comments', function () {
                return collect($this->comments)->each(function ($comment) {
                    return $comment->comentator;
                });
            }),
            'comments_total' => $this->whenLoaded('comments', function () {
                return $this->comments->count();
            })
        ];
    }
}
