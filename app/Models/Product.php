<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'barcode',
        'category_id',
        'cost_price',
        'sale_price',
        'utility',
        'stock',
        'min_stock',
        'status',
        'description'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    protected $casts = [
        'status' => 'boolean',
        'cost_price' => 'decimal:2',
        'sale_price' => 'decimal:2',
    ];


    public function scopeActive($query)
    {
        return $query->where(
            'status',
            true
        );
    }

    public function scopeLowStock($query)
    {
        return $query->whereColumn(
            'stock',
            '<=',
            'min_stock'
        );
    }

    public function kardex()
    {
        return $this->hasMany(
            Kardex::class
        );
    }
}
