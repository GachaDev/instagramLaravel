<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;


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

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, "belongs_to", "id");
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, "post_id", "id");
    }
}
