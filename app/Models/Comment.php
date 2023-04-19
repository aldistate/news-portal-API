<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'comments';
    protected $guarded = ['id'];

    // public function post()
    // {
    //     return $this->hasMany(Post::class, 'post_id', 'id');
    // }

    public function comentator()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
