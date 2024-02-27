<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'price',
        'first_name',
        'last_name',
        'email',
        'phone',
        'country',
        'product_name',
        'image',
        'sum',
        'count',
        'status',
        'town',
        'postcode',
        'street',
        'number',
        'payment',
        'region',

    ];
    use HasFactory;
}
