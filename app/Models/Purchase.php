<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = [
        'supplier_id',
        'invoice_number',
        'purchase_type',
        'purchase_date',
        'due_date',
        'subtotal',
        'tax',
        'total',
        'status',
        'observation',
        'confirmed_by',
        'confirmed_at',
        'cancelled_by',
        'cancelled_at',
    ];
    protected $casts = [
        'purchase_date' => 'date',
        'due_date' => 'date',
        'confirmed_at' => 'datetime',
        'cancelled_at' => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function supplier()
    {
        return $this->belongsTo(
            Supplier::class
        );
    }

    public function details()
    {
        return $this->hasMany(
            PurchaseDetail::class
        );
    }

    public function confirmedBy()
    {
        return $this->belongsTo(
            User::class,
            'confirmed_by'
        );
    }

    public function cancelledBy()
    {
        return $this->belongsTo(
            User::class,
            'cancelled_by'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    public function isDraft(): bool
    {
        return $this->status === 'BORRADOR';
    }

    public function isConfirmed(): bool
    {
        return $this->status === 'CONFIRMADA';
    }

    public function isCancelled(): bool
    {
        return $this->status === 'ANULADA';
    }
}
