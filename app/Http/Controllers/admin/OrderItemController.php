<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
class OrderItemController extends Controller
{
    
    public function orderItem(){
        if(!Auth::guard('admin')->user()){
            return redirect('/admin/login');
          }
        $order_item = OrderItem::orderBy("created_at","desc")->get();
        return view('admin.order-item.index',compact('order_item'));
    }
    public function showOrderitem($id){
        $model = OrderItem::find($id);
        return view('admin.order-item.view-order',compact('model'));
    }
    public function DeleteOrderitem($id){
        $model = OrderItem::find($id);
        $model->delete();
        return redirect('/admin/order-item');
    }
}
