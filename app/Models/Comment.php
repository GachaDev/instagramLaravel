<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    //

    protected $fillable = [
        'comment',
        'publish_at',
        'post_id',
        'user_id',
    ];

    public function posts(): BelongsTo {
        return $this->belongsTo(Post::class, "post_id", "id");
    }
}
