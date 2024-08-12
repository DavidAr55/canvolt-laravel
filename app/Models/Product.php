<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id', 'brand', 'name', 'description', 'description_min', 'price', 'discount', 'condition', 'type', 'photo_main', 'photos'
    ];

    protected $casts = [
        'photos' => 'array',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function inventory()
    {
        return $this->hasOne(Inventory::class);
    }

    /*public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->attributes['price'], 2) . ' MXN';
    }*/
}
