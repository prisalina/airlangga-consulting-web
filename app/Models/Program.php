<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'title', 'slug', 'description', 'content', 'thumbnail',
        'location', 'format', 'price', 'start_date', 'end_date',
        'quota', 'registration_link', 'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'start_date' => 'date',
        'end_date' => 'date',
        'price' => 'decimal:2',
    ];

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true)->orderBy('start_date');
    }

    public function getFormattedPriceAttribute(): string
    {
        if (! $this->price) {
            return 'Gratis';
        }

        return 'Rp '.number_format($this->price, 0, ',', '.');
    }
}
