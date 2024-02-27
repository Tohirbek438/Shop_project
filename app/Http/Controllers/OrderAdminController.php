<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
// use Illuminate\Support\Facades\Auth;
class OrderAdminController extends Controller
{
  
    public function orderIndex(){
    $order = Order::orderBy("created_at","desc")->get();
    return view('admin.product-index',compact('order'));
    }

    public function deleteOrder($id){
        $model = Order::find($id);
        if($model->delete()){
         
            return redirect('/admin/order-index');
        }
        else{
            return redirect('/admin/order-index');
        }
    }

    public function editOrder($id){
        $model = Order::find($id);
        return view('admin.order.edit-order',compact('model'));
    }
   public function EditSaveOrder(Request $request, $id){
   
    $order = Order::find($id);
    $order->name = $request->input('name');
    $order->title = $request->input('title');
    $order->price = $request->input('price');
    $order->short_titile = $request->input('short_titile');
    $order->count = $request->input('count');
    $order->image = $request->input('image');
    $order->save();
    return redirect('/admin/order-index'); 

   }

}
