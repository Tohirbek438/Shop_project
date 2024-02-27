@extends('layouts.header')
@section('content')


<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>{{$products->name}}</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>{{$products->category->name}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- Breadcrumb Section End -->

<!-- Product Details Section Begin -->
<section class="product-details spad">
    <form action="{{route('addCartButton')}}" method="POST">
        @csrf
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__item">
                        <?php $images = json_decode($products->image,true)?>
                        <img class="product__details__pic__item--large"
                            src="{{asset('images')}}/{{$images[0]}}" alt="">
                        </div>
                        <div class="product__details__pic__slider owl-carousel">
                        <?php $images = json_decode($products->image,true)?>
                        @foreach($images as $image)
                        <img data-imgbigurl="{{asset('images')}}/{{$image}}"
                            src="{{asset('images')}}/{{$image}}" alt="">

                            @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="product__details__text">
                    <h3>{{ $products->name}}</h3>
                    <div class="product__details__rating">
                        <!-- <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-half-o"></i>
                        -->
                    </div>
                    <div class="product__details__price">${{$products->price}}</div>
                    <p>{{ $products->title}}</p>

                    <div class="product__details__quantity">
                        <div class="quantity">
                            <div class="pro-qty">
                           
                                 <input type="hidden" name="name" id="product_name" value="{{$products->name}}">
                                 <input type="hidden" name="price" id="product_price" value="{{$products->price}}">
                                 <?php
                                                         $images = json_decode($products->image,true);
                                                         ?>
                                 <input type="hidden" name="image" id="product_image" value="{{$images[0]}}">
                                 <input type="hidden" name="category_id" id="category_id" value="{{$products->category_id}}">
                                 <input type="hidden" name="quantity" id="product_quantity" value="{{$products->quantity}}">
                                 <input type="hidden" name="sale_price" value="{{$products->price}}">
                                 <input type="hidden" name="id" id="id" value="{{$products->id}}">
                                 <span class="dec qtybtn" id="dec">-</span>
                                <input type="number" readonly value="1" style="margin-left:7%;" id="quantity" name="quantity">
                                <span class="inc qtybtn" id="inc">+</span>

                            </div>
                        </div>
                    </div>
                    <button onclick="addCartProduct('{{$products->id}}')" type="button" style="border-width:0;" class="primary-btn">ADD TO CARD</button>
                    <form action="/add-like" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{$products->id}}">
                                                         <input type="hidden" name="name" id="name_{{$products->id}}" value="{{$products->name}}">
                                                         <?php
                                                         $images = json_decode($products->image,true);
                                                         ?>
                                                         <input type="hidden" name="image" id="image_{{$products->id}}" value="{{$images[0]}}">
                                                         <input type="hidden" name="price" id="price_{{$products->id}}" value="{{$products->price}}">
                                                         <input type="hidden" name="discount" id="discount_{{$products->id}}" value="{{$products->discount}}">
                                                        
                                                    
                                                         <button type="button" style="border-radius:5px;height:50px;width:50px;" class="{{ App\Models\LikeCart::where('category_id', $products->id)->where('ip', Request::ip())->exists() ? 'likecart' : 'cart' }}" default type="button" id="product_{{ $products->id }}"  onclick="likeCart({{ $products->id }}, event)">
    <i style="font-size:20px;" class="fa fa-heart"></i>
</button> 
                                                        </form>

                    <ul>
                        <li><b>Availability</b> <span>In Stock</span></li>
                        <li><b>Weight</b> <span>{{$products->weight}}kg</span></li>
                        <li><b>Share on</b>
                            <div class="share">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-pinterest"></i></a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab"
                                aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab"
                                aria-selected="false">Information</a>
                        </li>
                      
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <div class="product__details__tab__desc">
                                <h6>Products Infomation</h6>
                                <p>{{$products->title}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <div class="product__details__tab__desc">
                               
                                <p>{{$products->short_title}}</p>
                            </div>
                        </div>
                        <div class="tab-pane" id="tabs-3" role="tabpanel">
                            <div class="product__details__tab__desc">
                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
</section>
<!-- Product Details Section End -->

<!-- Related Product Section Begin -->
<section class="related-product">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">



                <div class="section-title related__product__title">
                    <h2>Related Product</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($related_product as $product)


            <div class="col-lg-3 col-md-4 col-sm-6">
            
            <div class="product__item">
                                          <div class="product__item__pic set-bg" data-setbg="{{asset('images')}}/{{$images[1]}}">
                                          <ul class="product__item__pic__hover row" style="margin-left:32%;">
                                          <form action="/add-like" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                                         <input type="hidden" name="name" id="name_{{$product->id}}" value="{{$product->name}}">
                                                         <?php
                                                         $images = json_decode($product->image,true);
                                                         ?>
                                                         <input type="hidden" name="image" id="image_{{$product->id}}" value="{{$images[1]}}">
                                                         <input type="hidden" name="price" id="price_{{$product->id}}" value="{{$product->price}}">
                                                         <input type="hidden" name="discount" id="discount_{{$product->id}}" value="{{$product->discount}}">
                                                        
                                                    
                                                         <button type="button" class="{{ App\Models\LikeCart::where('category_id', $product->id)->where('ip', Request::ip())->exists() ? 'likecart' : 'cart' }}" default type="button" id="product_{{ $product->id }}"  onclick="likeCart({{ $product->id }}, event)">
    <i class="fa fa-heart"></i>
</button> 
                                                        </form>

                                                                                               <li><button style="border-width:0px;border-radius:100%;"><i class="fa fa-retweet"></i></button></li>
                                                          <form action="/add-cart" method="POST">
                                                            @csrf
                                                            <input type="hidden" name="id" value="{{$product->id}}">
                                                            <input type="hidden" name="name" value="{{$product->name}}">
                                                            <input type="hidden" name="price" value="{{$product->price}}">
                                                            <input type="hidden" name="discount" value="{{$product->discount}}">
                                                            <input type="hidden" name="category_id" value="{{$product->category_id}}">
                                                          <li><button   type="submit" style="border-width:0;border-radius:100%;"><i class="fa fa-shopping-cart"></i></button></li>

                                                        </form>
                                                        </ul>
                                       </div>
                                       <div class="product__item__text">
                                           <span>{{$product->category->name}}</span>
                                           <h6><a href="{{ route('product.one',['id' => $product->id])}}">{{$product->name}}</a></h6>
                                           <div class="product__item__price">
                                               <span>${{$product->price}}</span></div>
                                       </div>
                                   </div>
            </div>

            @endforeach

        </div>
    </div>
</section>
@endsection
