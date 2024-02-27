<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['name',
    'user_id',
    'product_id',
    'title',
    'short_titile',
    'price',
    'count',
    'image',
    'category_id',
    'total'
];
}
