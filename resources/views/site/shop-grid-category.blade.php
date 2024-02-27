@extends('layouts.header')
@section('content')

<section class="hero hero-normal">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul>
                            @foreach ($categories as $category )
                            <li><a href="/shop-grid/{{$category->name}}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">

                                <form action="{{ route('search.product')}}" method="GET">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>

                                <input type="text" placeholder="What do yo u need?" name="search">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Shop</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                                @foreach ($categories as $key => $r )
                                <li><a href="{{ route('shop.grid', [$r->name]) }}">{{$r->name}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="sidebar__item">
                       
                        </div>
                     
                        <div class="sidebar__item">
                            <div class="latest-product__text">
                                <h4>Latest Products</h4>
                                <div class="latest-product__slider owl-carousel">
                                    {{-- <div class="latest-prdouct__slider__item">
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-1.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-2.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                        <a href="#" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <img src="img/latest-product/lp-3.jpg" alt="">
                                            </div>
                                            <div class="latest-product__item__text">
                                                <h6>Crab Pool Security</h6>
                                                <span>$30.00</span>
                                            </div>
                                        </a>
                                    </div> --}}


                                    <div class="latest-prdouct__slider__item">
                                        @foreach($latestProducts as $product)
                                        <a href="{{route('product.one',['id' => $product->id])}}" class="latest-product__item">
                                            <div class="latest-product__item__pic">
                                                <?php
                                            $images = json_decode($product->image,true);
                                            ?>
                                                <img src="{{asset('images')}}/{{$images[1]  ?? null}}" alt="">
                                            </div>
                                            @if (app()->getLocale() == "uz")


                                            <div class="latest-product__item__text">
                                                <h6>{{$product->nameuz}}
                                                </h6>
                                                <span>{{$product->price}}</span>
                                            </div>
                                            @else
                                            <div class="latest-product__item__text">
                                                <h6>{{$product->name}}
                                                </h6>
                                                <span>${{$product->price}}</span>
                                            </div>
                                            @endif
                                        </a>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Discount products</h2>
                        </div>
                        <div class="row" id="table2">

                               @if(!$products->where('discount', '!=', 0)->isEmpty())
                               
                                @foreach ($products as $product )

                                @if($product->discount != 0)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                          
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
                                                                                              
                                                                                               <form action="/add-cart" method="GET">
                                                            @csrf
                                                            <?php
                                                           $images = json_decode($product->image,true);
                                                         ?>
                                                            <input type="hidden" name="id"  value="{{$product->id}}">
                                                            <input type="hidden" name="name" id="name_{{$product->id}}" value="{{$product->name}}">
                                                            <input type="hidden" name="image" id="image_{{$product->id}}" value="{{$images[0]}}">
                                                            <input type="hidden" name="price" id="price_{{$product->id}}" value="{{$product->price}}">
                                                            <input type="hidden" name="discount" value="{{$product->discount}}">
                                                            <input type="hidden" name="category_id" id="category_id_{{$product->id}}" value="{{$product->category_id}}">
                                                          <li><button onclick="addCart({{$product->id}},event)"  type="submit" style="border-width:0;border-radius:100%;"><i class="fa fa-shopping-cart"></i></button></li>

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
                   @else

                               @endif
                               @endforeach

@else

<div class="alert alert-danger col-md-12 col-sm-12">
Discount products are not available! </div>
@endif









                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                    <select>
                                        <option value="0">Nomiga</option>
                                        <option value="0">Sanasi</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span id="count"><?php echo $products->where('discount',0)->count()?></span> Products found</h6>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-3">
                                <div class="filter__option">
                                    <span class="icon_grid-2x2"></span>
                                    <span class="icon_ul"></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row mx-2" id="product_list">
                    @if(!$products->where('discount',0)->isEmpty())
                        @foreach ($products as $product )

                                             @if($product->discount == 0)
                                             <div class="col-lg-4 col-md-6 col-sm-6">
                                                        
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
                                                         


                                                                                               <form action="/add-cart" method="GET">
                                                            @csrf
                                                            <?php
                                                           $images = json_decode($product->image,true);
                                                         ?>
                                                            <input type="hidden" name="id"  value="{{$product->id}}">
                                                            <input type="hidden" name="name" id="name_{{$product->id}}" value="{{$product->name}}">
                                                            <input type="hidden" name="image" id="image_{{$product->id}}" value="{{$images[0]}}">
                                                            <input type="hidden" name="price" id="price_{{$product->id}}" value="{{$product->price}}">
                                                            <input type="hidden" name="discount" value="{{$product->discount}}">
                                                            <input type="hidden" name="category_id" id="category_id_{{$product->id}}" value="{{$product->category_id}}">
                                                          <li><button onclick="addCart({{$product->id}},event)"  type="submit" style="border-width:0;border-radius:100%;"><i class="fa fa-shopping-cart"></i></button></li>

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
                                @else

                                            @endif
                                            @endforeach
                                            @else
                                            <div class="alert alert-danger col-md-12 col-sm-12">Producs are not found! </div>
                                            @endif
                                        </div>
                    </div>

                    <div class="product__pagination">
                       
                    </div>

                </div>
            </div>
        </div>
    </section>
   @endsection
