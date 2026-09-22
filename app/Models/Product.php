<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'thumbnail',
        'price', 'purchase_link', 'category', 'sort_order', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('sort_order');
    }

    public function getFormattedPriceAttribute(): string
    {
        if (! $this->price) {
            return 'Gratis';
        }

        return 'Rp '.number_format($this->price, 0, ',', '.');
    }
}
