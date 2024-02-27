@extends('layouts.header')
@section('content')

<section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Organi Shop</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Search products</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Department</h4>
                            <ul>
                            @foreach($categories as $r)   
                            <li><a href="{{ route('shop.grid', [$r->name]) }}">{{$r->name}}</a></li>
                               @endforeach
                            </ul>
                        </div>
                    
                     

                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                        <h3>Found products</h3>
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Sort By</span>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span id="count"><?php echo $products->count()?></span> Products found</h6>
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
                    <div class="row" id="product_list">
                        @if($products->isEmpty())
                        <div class="alert alert-danger col-12"> Products are not found!</div>
                        @else
                        @foreach ($products as $product )

                        @if($product->discount != 0)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                                    <input type="hidden" name="id" id="id" value="{{$product->id}}">
                                    <input type="hidden" name="name" id="name" value="{{$product->name}}">
                                    <input type="hidden" name="price" id="price" value="{{$product->price}}">
                                    <input type="hidden" name="discount" id="discount" value="{{$product->discount}}">
                               <div class="product__item">
                                <?php
                                $images = json_decode($product->image,true);
                                ?>
                                  <div class="product__item__pic set-bg" data-setbg="{{asset('images')}}/{{$images[1]}}">
                                   <ul class="product__item__pic__hover">
                                     <li><button class="{{App\Models\LikeCart::where('category_id',$product->id)->exists() ? 'likecart':'cart'}} default" type="button" id="product_{{$product->id}}"  onclick="likeCart({{$product->id}})"><i class="fa fa-heart"></i></button></li>
                                     <li><a href="#"><i class="fa fa-retweet"></i></a></li>
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
           @else

                       @endif

                   
                       @endforeach
                       @endif
                        

                    </div>

                </div>
            </div>
        </div>
    </section>

@endsection
