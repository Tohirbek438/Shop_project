@extends('admin.layouts.main')
@section('content')



<div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$product->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$product->name}}</td>
                </tr>
                <tr>
                    <th>NameUz</th>
                    <td>{{$product->nameuz}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$product->title}}</td>
                </tr>
                <tr>
                    <th>TitleUz</th>
                    <td>{{$product->titleuz}}</td>
                </tr>
                <tr>
                    <th>Short Title</th>
                    <td>{{$product->short_title}}</td>
                </tr>
                <tr>
                    <th>Short TitleUz</th>
                    <td>{{$product->short_titleuz}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$product->price}}$</td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td>{{$product->weight}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$product->category->name}}</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>{{$product->discount == 0 ? "Discount is not available" : $product->discount."% " }}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td class="row">{{$product->status == 0 ? "noactive" : "active"}}

                  
                    </td>
                    <tr>
                    <th>Image</th>
                    <td class="row">
                    <?php
                            $images = json_decode($product->image, true); ?>
                            @foreach ($images as $image )
                            <div class="alert alert-light mx-2">
                            <img src="{{asset('images')}}/{{$image}}" width="100px" alt="">

</div>
@endforeach

                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$product->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$product->updated_at}}</td>
                </tr>
                </tbody></table>
        </div>
    </div>


@endsection



