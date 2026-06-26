<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = [
        'document_type',
        'document_number',
        'name',
        'company_name',
        'phone',
        'email',
        'address',
        'status',
        'observation',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where(
            'status',
            true
        );
    }
    public function purchases()
    {
        return $this->hasMany(
            Purchase::class
        );
    }
}
