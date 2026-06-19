<?php

namespace App\Models;

use App\Policies\CategoryPolicy;
use Illuminate\Database\Eloquent\Attributes\UsePolicy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

#[UsePolicy(CategoryPolicy::class)]
class Category extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'name',
        'description',
        'status',
    ];
}
