<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LikeCart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
        public function addLike(Request $request){
        $id = $request->input('id');
        $cart = LikeCart::where('category_id',$id)->where('ip',$request->ip())->first();
        if ($cart) {
            $cart->delete();
            return response()->json(['message' => 'Product removed']);
        }
        else{
        $like_cart = new LikeCart();
        $like_cart->name = $request->input('name');
        $like_cart->price = $request->input('price');
        $like_cart->discount = $request->input('discount');
        $like_cart->image = $request->input('image');
     
        $like_cart->category_id = $id;
        $like_cart->ip = $request->ip();
        $like_cart->save();
        return response()->json(['success' => true,'id' => $like_cart->id,'name' => $like_cart->name]);
        } 
      }

       public function likeIndex(Request $request){
       $likecart = LikeCart::where('ip',$request->ip())->get();

        return view('like.index-cart',['like' => $likecart]);
       }
       public function likeDelete($id){
        $likecart = LikeCart::find($id);
        if($likecart->delete()){
          return redirect('/like-index');
        }
        else{

        }
       }
}
