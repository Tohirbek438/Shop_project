@extends('layouts.header')
@section('content')
<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>My Wishes</h2>
                        <div class="breadcrumb__option">
                            <a href="/shop-grid">Home</a>
                            <span>Wishes</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<section class="featured spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h2>My wishes</h2>
                </div>
            </div>
        </div>
        
        @if(!$like->isEmpty())
        <div class="row featured__filter">
            @foreach($like as $r)
            <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                <div class="featured__item">
                    <div class="featured__item__pic set-bg" data-setbg="{{asset('images/'.$r->image)}}
                    ">
                        <ul class="featured__item__pic__hover row" style="margin:10px 33%;">


                     <form action="{{route('like-delete',['id' => $r->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                     <li><button type="submit" class="likecart"><i class="fa fa-heart"></i></button></li>
                    </form>
                             <li><button style="border:none;border-radius:100%;" ><i class="fa fa-retweet"></i></button></li>

                             <form action="/add-cart" method="GET">
                                                            @csrf
                                                          
                                                            <input type="hidden" name="id"  value="{{$r->id}}">
                                                            <input type="hidden" name="name" id="name_{{$r->id}}" value="{{$r->name}}">
                                                            <input type="hidden" name="image" id="image_{{$r->id}}" value="{{$r->image}}">
                                                            <input type="hidden" name="price" id="price_{{$r->id}}" value="{{$r->price}}">
                                                            <input type="hidden" name="discount" value="{{$r->discount}}">
                                                            <input type="hidden" name="category_id" id="category_id_{{$r->id}}" value="{{$r->category_id}}">
                                                          <li><button onclick="addCart({{$r->id}},event)"  type="submit" style="border-width:0;border-radius:100%;"><i class="fa fa-shopping-cart"></i></button></li>

                                                        </form>
                            {{-- <li><a href="#"><i class="fa fa-heart"></i></a></li>
                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li> --}}
                        </ul>
                    </div>
                    <div class="featured__item__text">
                        <h6><a href="#">{{$r->name}}</a></h6>
                        <h5>{{$r->price}}$</h5>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        @else
         <div class="alert alert-danger">Products are not available in my wishes!</div>
        @endif
    </div>
</section>

                    @endsection
