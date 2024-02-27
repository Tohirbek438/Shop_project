<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

class DeleteCartController extends CartController
{

    public function dellItem($id, Request $request){
     $session =  Session::get('cart');

      unset($session[$id]);
      Session::put('cart', $session);
      $this->calculateCart($request);

      $total = Session::get('total');
      $quantity = Session::get('quantity');
     return response()->json(['success' => true, 'total' => $total,
     'total_count' => $quantity]);
    }
}
