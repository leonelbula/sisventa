<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = [
        'name',
        'business_name',
        'nit',
        'dv',
        'email',
        'phone',
        'mobile',
        'address',
        'city',
        'department',
        'logo',
        'invoice_prefix',
        'invoice_consecutive',
        'tax_percentage',
        'status',
    ];


}
