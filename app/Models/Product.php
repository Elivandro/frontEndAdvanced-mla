<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'comparative_price',
        'short_description',
        'long_description'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function photos(): HasMany
    {
        return $this->hasMany(Photo::class);
    }

    public function skus(): HasMany
    {
        return $this->hasMany(Sku::class);
    }

    protected function price(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value/100, 2, ","),
            set: fn($value) => preg_replace("/\D/", "", $value), 
        );
    }

    protected function comparativePrice(): Attribute
    {
        return Attribute::make(
            get: fn($value) => number_format($value/100, 2, ","),
            set: fn($value) => preg_replace("/\D/", "", $value),
        );
    }
    
}
