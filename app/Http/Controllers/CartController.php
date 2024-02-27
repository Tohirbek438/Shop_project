<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
   public function shopCart(){
         return view('cart.shop-cart');
    
  
        return redirect('/user/login');
  
   }


    public function cart(){

    }

    public function addCart(Request $request){
     if ($request->session()->has('cart')) {
     $cart = $request->session()->get('cart');
     $product_array_id = array_column($cart,'id');
     $id = $request->input('id');
        if(!in_array($id, $product_array_id)){
           $name = $request->input('name');
           $price = $request->input('price');
           $image = $request->input('image');
           $category = $request->input('category_id');
           $quantity = 1;
           $sale_price = $request->input('price');
           if($sale_price!=null){
             $price_charge = $sale_price;
           }
           else{
             $price_charge = $price;
           }
           $product_array = array(
          'id' => $id,
          'name' => $name,
          'image' => $image,
          'price' => $price,
          'quantity' => $quantity
           );
           $cart[$id] = $product_array;
           $request->session()->put('cart',$cart);
           $this->calculateCart($request);
           $total = Session::get('total');
           $quantity = Session::get('quantity');
           return response(['success' => true,'all_quantity' =>$quantity,'total' => $total]);
           
        }

        else{
                $cart[$id]['quantity'] += 1;
                $request->session()->put('cart', $cart);
                $this->calculateCart($request);
                $total = Session::get('total');
                $quantity = Session::get('quantity');
                return response(['success' => true,'all_quantity' =>$quantity,'total' => $total]);
        }
        $this->calculateCart($request);
        toastr()->success('Product is added to cart successfully!');
        $total = Session::get('total');
        $quantity = Session::get('quantity');
        return response(['success' => true,'all_quantity' =>$quantity,'total' => $total]);
     }
     else{
        $cart = array();
        $id = $request->input('id');
        $name = $request->input('name');
        $price = $request->input('price');
        $image = $request->input('image');
        $category = $request->input('category_id');
        $sale_price = $request->input('price');
        $quantity = 1;
        if($sale_price!=null){
        $price_charge = $sale_price;
          }
          else{
        $price_charge = $price;
          }
        $product_array = array(
         'id' => $id,
         'name' => $name,
         'image' => $image,
         'price' => $price,
         'quantity' => $quantity
          );
          $cart[$id] = $product_array;
          $request->session()->put('cart',$cart);
          $this->calculateCart($request);
          $total = Session::get('total');
          $quantity = Session::get('quantity');
          return response(['success' => true,'all_quantity' => $quantity,'total' => $total]);
        }
    }
    public function calculateCart(Request $request){
        $cart =$request->session()->get('cart');
        $all_quantity = 0;
        $all_price = 0;
        foreach($cart as $id => $product){
        $product = $cart[$id];
        $price = $product['price'];
        $quantity = $product['quantity'];
        $all_price +=  $price * $quantity;
        $all_quantity += $quantity;
        }
        $request->session()->put('total',$all_price);
        $request->session()->put('quantity',$all_quantity);
    }
     public function removeCart(Request $request){
       if($request->session()->has('cart')){
        $id = $request->input('id');
        $cart = $request->session()->get('cart');
        unset($cart[$id]);
        $request->session()->put('cart',$cart);
        $this->calculateCart($request);
       }
        return response(['success' => true]);
     }
     public function saveOrder(){
        return view('order.save-order');
     }

     public function editQuantity($id, $signal, Request $request)
     {
         $cart = Session::get('cart');

    if ($cart && array_key_exists($id, $cart)) {
        if ($signal === 'minus') {
         
          if ($cart[$id]['quantity'] > 0) {
            $cart[$id]['quantity']--;
        }
        } elseif ($signal === 'plus') {
            $cart[$id]['quantity']++;
        }
        Session::put('cart', $cart);
        $this->calculateCart($request);


        $total = Session::get('total');
        $quantity = Session::get('quantity');


        return response()->json([
            'success' => true,
            'message' => 'Quantity updated successfully',
            'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $total,
            'id' => $cart[$id],
            'total_count' => $quantity
        ]);
    }


    return response()->json([
        'success' => false,
        'message' => 'Product not found in the cart'
    ]);
     }
     public function addCartButton(Request $request){
        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            $product_array_id = array_column($cart,'id');
            $id = $request->input('id');
               if(!in_array($id, $product_array_id)){
                  $name = $request->input('name');
                  $price = $request->input('price');
                  $image = $request->input('image');
                  $category = $request->input('category_id');
                  $quantity = $request->input('quantity');
                  $sale_price = $request->input('price');
                  if($sale_price!=null){
                    $price_charge = $sale_price;
                  }
                  else{
                    $price_charge = $price;
                  }
                  $product_array = array(
                 'id' => $id,
                 'name' => $name,
                 'image' => $image,
                 'price' => $price,
                 'quantity' => $quantity
                  );
                  $cart[$id] = $product_array;
                  $request->session()->put('cart',$cart);
                  $this->calculateCart($request);
                  $total = Session::get('total');
                 $quantity = Session::get('quantity');

                  return  response()->json([
            'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $total,
            'id' => $cart[$id],
            'cost_all' => $cart[$id]['price'] * $cart[$id]['quantity'],
            'total_count' => $quantity
                  ]);
               }

               else{
                       $cart[$id]['quantity'] += $request->input('quantity');
                       $request->session()->put('cart', $cart);
                       $this->calculateCart($request);
                       $total = Session::get('total');
                       $quantity = Session::get('quantity');

                       return response()->json([
                        'quantity' => $cart[$id]['quantity'],
                        'price' => $cart[$id]['price'],
                        'total' => $total,
                        'id' => $cart[$id],
                        'total_count' => $quantity
                      ]);
             }
               $this->calculateCart($request);
               $total = Session::get('total');
                 $quantity = Session::get('quantity');

               return response()->json([
                'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $total,
            'id' => $cart[$id],
            'total' => $cart[$id]['price'] * $cart[$id]['quantity'],
            'total_count' => $quantity
               ]);
            }
            else{
               $cart = array();
               $id = $request->input('id');
               $name = $request->input('name');
               $price = $request->input('price');
               $image = $request->input('image');
               $category = $request->input('category_id');
               $sale_price = $request->input('price');
               $quantity = $request->input('quantity');
               if($sale_price!=null){
               $price_charge = $sale_price;
                 }
                 else{
               $price_charge = $price;
                 }
               $product_array = array(
                'id' => $id,
                'name' => $name,
                'image' => $image,
                'price' => $price,
                'quantity' => $quantity
                 );
                 $cart[$id] = $product_array;
                 $request->session()->put('cart',$cart);
                 $this->calculateCart($request);
                 $total = Session::get('total');
                 $quantity = Session::get('quantity');

                 return response()->json([
                    'quantity' => $cart[$id]['quantity'],
            'price' => $cart[$id]['price'],
            'total' => $cart[$id]['price'] * $cart[$id]['quantity'], 
            'total' => $total,
            'id' => $cart[$id],
            'total_count' => $quantity
                 ]);
               }

     }


}
