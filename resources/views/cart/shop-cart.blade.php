@extends('layouts.header')
@section('content')




<section class="shoping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__table">
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
                            @foreach(Session::get('cart') as $product)
                            <tr>
                                <td class="shoping__cart__item">
                                    <img src="img/cart/cart-1.jpg" alt="">
                                    <h5>{{$product['name']}}</h5>
                                </td>
                                <td class="shoping__cart__price">
                                   ${{$product['price']}}
                                </td>
                                <td class="shoping__cart__quantity">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="{{$product['quantity']}}">
                                        </div>
                                    </div>
                                </td>
                                <td class="shoping__cart__total">
                                    ${{$product['price'] * $product['quantity']}}
                                </td>
                                <td class="shoping__cart__item__close">
                                    <form action="{{ route('remove.item') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $product['id'] }}">
                                <button style="border:0px solid red;" type="submit" class="btn-delete">
                                    <span class="icon_close">
                                    </span>
                                    </button>
                            </form>

                                </td>
                            </tr>
                            @endforeach
                           <span>{{Session::get('quantity')}}</span>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="shoping__cart__btns">
                    <a href="#" class="primary-btn cart-btn">Send to order</a>
                    <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                        Delete cart</a>
                </div>
            </div>


        </div>
    </div>
</section>
@endsection
