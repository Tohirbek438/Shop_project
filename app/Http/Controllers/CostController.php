<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
class CostController extends Controller
{
public function priceFilter(Request $request){
$min = $request->input('min');
$max = $request->input('max');

$scores1 = Product::whereBetween('price', [$min, $max])->where('discount','!=',0)->get();
$scores = Product::whereBetween('price', [$min,$max])->whereNull('discount')->get();
$count = $scores->count();
$table_view = view('site.filter-product',['scores'=>$scores])->render();
$table_view1 = view('site.filter-product2',['scores1'=>$scores1])->render();
return response()->json(['succes' => true, 'table_view' => $table_view,'table_view1' => $table_view1,'count' => $count]);
}
}
