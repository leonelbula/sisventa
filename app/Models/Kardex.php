<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kardex extends Model
{

    public const INITIAL = 'INICIAL';
    public const PURCHASE = 'COMPRA';
    public const SALE = 'VENTA';
    public const RETURN = 'DEVOLUCION';
    public const ADJUSTMENT = 'AJUSTE';


    protected $table = 'kardex';
    protected $fillable = [
        'product_id',
        'movement_date',
        'type',
        'reference',
        'user',
        'quantity',
        'stock_before',
        'stock_after',
        'unit_cost',
        'total_cost',
        'observation',
    ];

    protected $casts = [
        'movement_date' => 'datetime',
        'unit_cost' => 'decimal:2',
        'total_cost' => 'decimal:2',
    ];

    public function product()
    {
        return $this->belongsTo(
            Product::class
        );
    }
}
