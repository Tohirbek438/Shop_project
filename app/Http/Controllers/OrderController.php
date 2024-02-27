<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Order;
use Session;
use Illuminate\Support\Facades\Auth;
class OrderController extends Controller
{
 public function orderProducts(){


    return view('order.save-order');
 }

public function saveOrder(Request $request){
    if(Auth::check()){

    
    $carts = Session::get('cart');
    if($carts){
        $order = new Order();
        foreach($carts as $cart){
            $order_id = Order::where('id', $cart['id'])->first();
            if($order_id){
                $order_id->count += $cart['quantity'];
                $order_id->total += $cart['price'] * $cart['quantity'];
                $order_id->save();
            }
                Order::create([
                    'name' => $cart['name'],
                    'user_id' => Auth::user()->id,
                    'product_id' => $cart['id'],
                    'title' => "title",
                    'short_titile' => "title",
                    'price' => $cart['price'],
                    'count' => $cart['quantity'],
                    'image' => $cart['image'],
                    'total' => $cart['price'] * $cart['quantity'],
                    'category_id' => 1
                ]);
        }
    }
    Session::forget('cart');
    Session::forget('total');
    Session::forget('quantity');
    return redirect('/order/check-out');
}
    else{
        return redirect('/user/login');
    }
    

}


   public function checkout(){
    if (Auth::check()) {
        $order = Order::where('user_id',Auth::user()->id)->get();
        $total = Order::where('user_id',Auth::user()->id)->sum('total');
        $quantity = Order::where('user_id',Auth::user()->id)->sum('count');
        return view('checkout.checkout',compact('order','total','quantity'));    
    }
    else{
        return redirect('/user/login');
    }
    
   }






}
