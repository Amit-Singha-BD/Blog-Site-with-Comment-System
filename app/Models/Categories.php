<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categories extends Model
{
    protected $fillable = [
        "categories_name",
        "categories_slug",
        "categories_description",
    ];

    public function posts(){
        return $this->hasMany(Post::class, 'category_id');
    }

    public function article(): HasMany {
        return $this->hasMany(Article::class);
    }
}