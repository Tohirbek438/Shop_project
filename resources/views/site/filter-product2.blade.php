
@if($scores1->isEmpty())
<div class="alert alert-danger col-12">Discount products are not available!</div>
@else
@foreach ($scores1 as $product )
<div class="col-lg-4 col-md-6 col-sm-6">
          
            <div class="product__item">
            <?php
                         $images = json_decode($product->image,true);
                         ?>
          <div class="product__item__pic set-bg" data-setbg="{{asset('images')}}/{{$images[1]}}">
            <img src="{{asset('images')}}/{{$images[1]}}" alt="">
          <ul class="product__item__pic__hover row" style="margin-left:32%;">
                     <form action="/add-like" method="GET">
                        @csrf
                        <input type="hidden" name="id" id="id" value="{{$product->id}}">
                         <input type="hidden" name="name" id="name_{{$product->id}}" value="{{$product->name}}">
                         <?php
                         $images = json_decode($product->image,true);
                         ?>
                         <input type="hidden" name="image" id="image_{{$product->id}}" value="{{$images[0]}}">
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
@endif