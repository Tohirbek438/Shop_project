<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
class OrderItemController extends Controller
{

   public function saveCheckOut(Request $request)
{


     
    $orders = Order::all();

   //  return $order;

    foreach ($orders as $order) {
       
       
       $createOrder = new OrderItem();
       $createOrder->price = $order->price;
       $createOrder->product_name = $order->name;
       $createOrder->image = $order->image;
       $createOrder->user_id = Auth::user()->id;
       $createOrder->product_id = $order->id;
       $createOrder->count = $order->total;
       $createOrder->product_count = $order->count;
       $createOrder->sum = $order->price * $order->count;
       $createOrder->first_name = $request->input('first_name');
       $createOrder->last_name = $request->input('last_name');
       $createOrder->region = $request->input('region');
       $createOrder->email = $request->input('email');
       $createOrder->phone = $request->input('phone');
       $createOrder->country = $request->input('country');
       $createOrder->phone = $request->input('phone');
       $createOrder->status = "active";
       $createOrder->town = $request->input('town');
       $createOrder->postcode = $request->input('postcode');
       $createOrder->street = $request->input('street');
       $createOrder->number = $request->input('number');
       $createOrder->payment = $request->input('payment');
       $createOrder->save();
    
      }
      Order::truncate();
      toastr()->success('Order is saved.Thank you for buying our products!');
      return redirect('/order/check-out');
      

   }


}
