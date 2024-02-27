<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
class SearchController extends Controller
{
    public function search(Request $request){
       
        $s = $request->input('search');
        $products = Product::where('name','LIKE',"%{$s}%")->where('nameUz','LIKE',"%{$s}%")->get();
        $categories = Category::all();
         return view('search.search-product',compact('products','categories'));
    }

  
    public function priceFilter(Request $request){
        $min = $request->input('min');
        $max = $request->input('max');
        $scores = Product::whereBetween('price',[$min,$max])->get();
        $count = $scores->count();
        $table_view = view('site.filter-product',['scores'=>$scores])->render();
        return response()->json(['succes' => true, 'table_view' => $table_view,'count' => $count]);
        }

}
