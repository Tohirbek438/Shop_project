@extends('layouts.header')
@section('content')

    <section class="hero">

        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories " id = "box1" >
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>@lang('words.allcategories')</span>
                        </div>
                        <ul >
                            @foreach ($categories as $category )


                            <li><a href="{{ route('shop.grid', [$category->name]) }}">{{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="{{ route('search.product')}}" method="GET">
                                <div class="hero__search__categories">
                                    @lang('words.allcategories')
                                    <span class="arrow_carrot-down"></span>
                                </div>

                                <input id = "search" type="text" placeholder="@lang('words.search_input')" name="search">
                                <button type="submit" class="site-btn">@lang('words.search')</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+65 11.188.888 </h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg " id = "box2" data-setbg=" /img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="/shop-grid" class="primary-btn">SHOP NOW</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Categories Section Begin -->
    <section class="categories" id = 'box3'>
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    @foreach($categories as $r)
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="{{asset('images')}}/{{$r->image}}">
                            <h5><a href="{{ route('shop.grid', [$r->name]) }}">{{$r->name}}</a></h5>
                        </div>    
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                        <li class="active" data-filter="*">All</li>    
                        @foreach($categories as $r)
                            
                            <li data-filter=".{{$r->name}}">{{$r->name}}</li>
                            
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter" id = 'box4'>
                @foreach($product as $r)
                <div class="col-lg-3 col-md-4 col-sm-6 mix {{$r->category->name}}">
                    <div class="featured__item">
                    <?php
                                        $images = json_decode($r->image,true);
                                        ?>
                        <div class="featured__item__pic set-bg" data-setbg="{{asset('images')}}/{{$images[1] ?? null}}">
                            <ul class="featured__item__pic__hover row" style="margin-left:32%;list-style-type:none;">
                                                     <form action="/add-like" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="id" id="id" value="{{$r->id}}">
                                                         <input type="hidden" name="name" id="name_{{$r->id}}" value="{{$r->name}}">
                                                         <?php
                                                         $images = json_decode($r->image,true);
                                                         ?>
                                                         <input type="hidden" name="image" id="image_{{$r->id}}" value="{{$images[1]}}">
                                                         <input type="hidden" name="price" id="price_{{$r->id}}" value="{{$r->price}}">
                                                         <input type="hidden" name="discount" id="discount_{{$r->id}}" value="{{$r->discount}}">
                                                        
                                                    
                                                         <button type="button" class="{{ App\Models\LikeCart::where('category_id', $r->id)->where('ip', Request::ip())->exists() ? 'likecart' : 'cart' }}" default type="button" id="product_{{ $r->id }}"  onclick="likeCart({{ $r->id }}, event)">
    <i class="fa fa-heart"></i>
</button> 
                                                        </form>
                                   <li><button style="border-width:0px;border-radius:100%;"><i class="fa fa-retweet"></i></button></li>
                                   
                                   <form action="/add-cart" method="GET">
                                                            @csrf
                                                            <?php
                                                           $images = json_decode($r->image,true);
                                                         ?>
                                                            <input type="hidden" name="id"  value="{{$r->id}}">
                                                            <input type="hidden" name="name" id="name_{{$r->id}}" value="{{$r->name}}">
                                                            <input type="hidden" name="image" id="image_{{$r->id}}" value="{{$images[0]}}">
                                                            <input type="hidden" name="price" id="price_{{$r->id}}" value="{{$r->price}}">
                                                            <input type="hidden" name="discount" value="{{$r->discount}}">
                                                            <input type="hidden" name="category_id" id="category_id_{{$r->id}}" value="{{$r->category_id}}">
                                                          <li><button onclick="addCart({{$r->id}},event)"  type="submit" style="border-width:0;border-radius:100%;"><i class="fa fa-shopping-cart"></i></button></li>

                                                        </form>                          


















                                                        </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="{{route('product.one',['id' => $r->id])}}">{{$r->name}}</a></h6>
                            <h5>${{$r->price}}</h5>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Featured Section End -->

    <!-- Banner Begin -->
    <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-1.jpg" alt="">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="banner__pic">
                        <img src="/img/banner/banner-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Banner End -->

    <!-- Latest Product Section Begin -->
    <section class="latest-product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Latest Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($latestProducts as $r)
                            <?php
                                        $images = json_decode($r->image,true);
                                        ?>
                                <a href="{{route('product.one',['id' => $r->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('images')}}/{{$images[1] ?? null}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>${{$r->price}}</span>
                                    </div>
                                </a>
                              
                                @endforeach
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($latestProducts as $r)
                            <?php
                                        $images = json_decode($r->image,true);
                                        ?>
                                <a href="{{route('product.one',['id' => $r->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{asset('images')}}/{{$images[1] ?? null}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>${{$r->price}}</span>
                                    </div>
                                </a>
                              
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>New Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                            @foreach($newProducts as $r) 
                            <?php
                                        $images = json_decode($r->image,true);
                                        ?>   
                            <a href="{{route('product.one',['id' => $r->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('images')}}/{{$images[1] ?? null}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>${{$r->price}}</span>
                                    </div>
                                </a>
                                @endforeach
                               
                            </div>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="latest-product__text">
                        <h4>Discount Products</h4>
                        <div class="latest-product__slider owl-carousel">
                            <div class="latest-prdouct__slider__item">
                                @foreach($product as $r)
                                @if($r->discount !=0)
                                <?php
                                        $images = json_decode($r->image,true);
                                        ?>  
                                <a href="{{route('product.one',['id' => $r->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('images')}}/{{$images[1] ?? null}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>${{$r->price}}</span>
                                    </div>
                                </a>
                                @else
                                @endif
                                @endforeach
                              
                            </div>
                            <div class="latest-prdouct__slider__item">
                            @foreach($product as $r)
                                @if($r->discount !=0)
                                <?php
                                        $images = json_decode($r->image,true);
                                        ?>  
                                <a href="{{route('product.one',['id' => $r->id])}}" class="latest-product__item">
                                    <div class="latest-product__item__pic">
                                        <img src="{{ asset('images')}}/{{$images[1] ?? null}}" alt="">
                                    </div>
                                    <div class="latest-product__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>${{$r->price}}</span>
                                    </div>
                                </a>
                                @else
                                @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Product Section End -->

    <!-- Blog Section Begin -->
    <section class="from-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title from-blog__title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img width="180px" height="300px" src="
                      {{asset('blog_image/'.$blog->image)}}
                            " alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i> {{$blog->created_at}}</li>
                                <!-- <li><i class="fa fa-comment-o"></i> 5</li> -->
                            </ul>
                            <h5><a href="{{route('blogView',['id' => $blog->id])}}">{{$blog->name}}</a></h5>
                            <p>{{$blog->short_title}}</p>
                        </div>
                    </div>
                </div>
             
                @endforeach
            </div>
        </div>
    </section>

@endsection
