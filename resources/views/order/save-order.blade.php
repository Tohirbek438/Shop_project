@extends('layouts.header')
@section('content')

<form action="{{route('order.save')}}" method="POST" enctype="multipart/form-data">
@csrf


<section class="shoping-cart spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                    @if(Session::has('cart'))    
                    <table>
                        
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>

                          
                                                 
                        
                            <tbody>
                  
                                @foreach (Session::get('cart') as $product)
                                    <tr id="product_list_{{$product['id']}}">
                                        <td class="shoping__cart__item">
                                            <img width="150px" height="120px;" src="{{asset('images/'.$product['image'])}}" alt="">
                                            <h5>{{ $product['name'] }}</h5>
                                        </td>
                                        <td class="shoping__cart__price">
                                            ${{ $product['price'] }}
                                        </td>
                                        <td class="shoping__cart__quantity" >
                                            <div class="quantity">
                                                <div class="pro-qty row" id="form" style="width:200px;" style="position:relative; right:10%;">

                                                    <input type="button" onclick="minusProduct({{ $product['id'] }})" value="-" class=" btn-decrease-product" onclick="minusProduct({{ $product['id'] }})"
                                                    name="decrease_product">
                                                    <input type="hidden" name="id" id="product_id" value="{{$product['id']}}" data-id="{{$product['id']}}">
                                                   <input type="text" readonly name="count" id="quantity_{{$product['id']}}" min="1"
                                                   value="{{ $product['quantity'] }}">
                                                   <input style="" value="+" onclick="plusProduct({{ $product['id'] }})" type="button" class="btn-increase-product"
                                                   name="increase_product">


                                                </div>
                                            </div>
                                        </td>
                                        <td class="shoping__cart__total">
                                           <input id="count_{{$product['id']}}" name="all_price" style="text-align:center; border-width:0;" type="text" value="${{$product['price'] * $product['quantity'] }}"readonly>
                                        </td>
                                        <td class="shoping__cart__item__close">

                                                <button style="border-width: 0px" style="position:relative;right:40%!important;" type="button" onclick="deleteProduct({{$product['id']}})">
                                            <span class="icon_close"></span>

                                        </button>

                                        </td>
                                    </tr>
                                @endforeach
                              
                        </tbody>
                      
    

                        </table>
                    
                     
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                     
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                <div class="col-lg-6">
                    
                <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Count <span id="total_quantity">{{ Session::get('quantity') }}</span></li>
                            <li>All price <span id="total_price">${{ Session::get('total') }}</span></li>
                        </ul>
                        
                        <button type="submit" class="primary-btn">PROCEED TO CHECKOUT</button>
                      
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    @else
                              <div class="alert alert-danger">Product is not available in cart</div>
                              @endif 
    </form>

 
@endsection
