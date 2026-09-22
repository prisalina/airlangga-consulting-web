<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $fillable = [
        'title', 'slug', 'client', 'sector', 'excerpt', 'content',
        'thumbnail', 'service_type', 'completed_at', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'completed_at' => 'date',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->latest('completed_at');
    }
}
