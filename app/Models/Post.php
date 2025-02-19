<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $fillable = [
        'title',
        'description',
        'url_image',
        'published_at',
        'n_likes',
        'belongs_to',
    ];
}
