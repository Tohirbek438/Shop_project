@extends('layouts.header')
@section('content')


    <!-- Breadcrumb Section Begin -->
    <section style="mt-2" class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
            <div class="row">

            </div>
            <div class="checkout__form">
                <h4>Billing Details</h4>
                <form action="{{ route('save.check-out')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">

                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name" value="{{Auth::user()->firstname}}">
                                      </div>
                                      
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name" value="{{Auth::user()->lastname}}">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                
                                <p>Country<span>*</span></p>
                                <input required type="text" name="country">
                                @error('country')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" name="street" placeholder="Street Address" class="checkout__input__add">
                                @error('street')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <input type="number" name="number" placeholder="Apartment, suite, unite ect (optinal)">
                              <br>
                              @error('number')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="town">
                                @error('town')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Region<span>*</span></p>
                                <input type="text" name="region">
                                @error('region')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="checkout__input">
                                <p>Postcode / ZIP<span>*</span></p>
                                <input type="text" name="postcode">
                                @error('postcode')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone" value="{{Auth::user()->phone}}">
                                        @error('phone')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Email<span>*</span></p>
                                        <input type="text" name="email" value="{{Auth::user()->email}}">
                                        @error('email')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="checkout__order">
                                <h4>Your Order</h4>
                                <div class="checkout__order__products">Products  <span style="position:relative; left:-50%;">Count</span><span>Total</span></div>
                                <ul>
                                    @foreach($order as $r)
                                    <li>{{$r->name}} <span style="position:relative; left:-50%;">{{$r->count}}</span>  <span style="float:right;">${{$r->total}}</span></li>
                                    
                                    @endforeach
                                </ul>
                                <div class="checkout__order__subtotal">Quantity<span>{{$quantity}}</span></div>
                                <div class="checkout__order__total">Total <span>${{$total}}</span></div>

                                <div class="checkout__input__checkbox">
                                    <label for="payment">
                                        Check Payment
                                        <input type="radio" id="payment" name="payment" value="payment">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <input type="hidden" name="status" value="active">
                                <div class="checkout__input__checkbox">
                                    <label for="paypal">
                                        Paypal
                                        <input type="radio" id="paypal" name="payment" value="paypal">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                @error('payment')
                                <span style="color:red;">{{$message}}</span>
                                @enderror
                                <button type="submit" class="site-btn">PLACE ORDER</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>












@endsection
