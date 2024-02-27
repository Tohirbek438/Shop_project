@extends('admin.layouts.main')
@section('content')
<div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i class="fas fa-expand"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>ID</th>
                    <td>12</td>
                </tr>
                <tr>
                    <th>Product name</th>
                    <td>{{$order->name}}</td>
                </tr>
                <tr>
                    <th>Price</th>
                    <td>{{$order->price}}</td>
                </tr>
                <tr>
                    <th>Short title	</th>
                    <td>{{$order->short_title}}</td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>{{$order->discount == 0 ? "Discount is not available" : $order->discount."%"}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img src="{{asset('images/'.$order->image)}}" alt="Image can be available"></td>
                </tr>
                <tr>
                    <th>Count</th>
                    <td><p>{{$order->count}}<br></p></td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td><p>{{$order->category_id}}<br></p></td>
                </tr>
                <tr>
                    <th>User</th>
                    <td><p>{{$order->user_id}}<br></p></td>
                </tr>
                <tr>
                    <th>Total</th>
                    <td><p>{{$order->total}}<br></p></td>
                </tr>
                <tr>
                    <th>Holati</th>
                    <td>
                        <span class="badge badge-success">Faol</span>
                    </td>
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$order->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$order->updated_at}}</td>
                </tr>
                </tbody></table>
        </div>
    </div>
    @endsection