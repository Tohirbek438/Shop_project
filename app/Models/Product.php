<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['name','title','short_title','price','discount','image','category_id','status',
    'titleuz',
    'short_titleuz',
    'nameuz',
    'weight'
];



    public function category(){
        return $this->belongsTo(Category::class);
    }



}



