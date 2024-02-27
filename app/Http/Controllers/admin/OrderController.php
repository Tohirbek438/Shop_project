<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
class OrderController extends Controller
{
    public function view($id){
      
        $order = Order::find($id);

        return view('admin.order.view',compact('order'));
    }
}
