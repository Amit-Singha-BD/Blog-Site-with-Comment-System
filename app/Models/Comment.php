<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'comment',
        'post_id',
        'user_id',
        'reply_id',
    ];

    public function post(){
        return $this->belongsTo(Post::class);
    }

    public function reply(){
        return $this->hasOne(Comment::class, 'reply_id');
    }

    public function parent(){
        return $this->belongsTo(Comment::class, 'reply_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}