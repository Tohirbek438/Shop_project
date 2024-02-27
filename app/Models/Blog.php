<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['name','title','image','short_title','admin_id','category_id'];
   
    public function blogcategory(){
        return $this->belongsTo(BlogCategory::class,'category_id');
    }
    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
