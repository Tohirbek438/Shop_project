@extends('admin.layouts.main')
@section('content')



<div class="card">
    <div class="card-header">
      <h3 class="card-title">DataTable with default features</h3>
      <a href="{{route('admin.create.product')}}" class="btn btn-success btn-lg" style="float: right">Create Products</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>T/N</th>
          <th>Product name</th>
          <th>Title</th>
          <th>Price</th>
          <th>Discount</th>
          <th>Image</th>
          <th>Category</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($product as $r )
        <tr>
            <td>{{$r->id}}</td>
          <td>{{$r->name}}</td>
          <td>{{$r->short_title}}

          </td>
          <td>{{$r->price}}</td>
         
        @if($r->discount !="")
        <td>
        {{$r->discount}}
        </td>
        
        @else
        <td> 
      Mavjud emas  
        </td>
        @endif
        
          <td>
            <?php
                $images = json_decode($r->image, true);
                ?>
           <img height="100px" width="100%" src="{{asset('images')}}/{{$images[0] ?? '0'}}" alt="">
          </td>
          <td>{{$r->category->name}}</td>
             
          <td class="row" style="border:0px;">
            <a href="{{route('product-one', ['id' => $r->id])}}" style="height:30px;" class="btn btn-success mx-1 btn-sm"><i class="fas fa-eye">                     </i> </a>
            <a href="{{route('product-edit',['id' => $r->id])}}" style="height:30px;" class="btn btn-info mx-1 btn-sm"><i class="fas fa-pen"></i></a>
            <form action="{{ route('deleteProduct',['id' => $r->id])}}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" style="height:30px;" class="btn btn-danger">
            <i class="fas fa-trash"></i>
            </button>
            </form>
          </td>
        
        </tr>

        @endforeach

        </tfoot>
      </table>
    </div>
    <!-- /.card-body -->
  </div>

  @endsection
