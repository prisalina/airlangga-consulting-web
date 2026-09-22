<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $fillable = [
        'post_category_id', 'title', 'slug', 'excerpt', 'content',
        'thumbnail', 'meta_title', 'meta_description', 'published_at', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id');
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopePublished($query)
    {
        return $query->where('is_active', true)
            ->whereNotNull('published_at')
            ->where('published_at', '<=', now())
            ->latest('published_at');
    }
}
