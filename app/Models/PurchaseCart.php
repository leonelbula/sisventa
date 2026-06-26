<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PurchaseCart extends Model
{
    protected $fillable = [

        'user_id',
        'product_id',
        'quantity',
        'cost_price',
        'subtotal',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
