@extends('admin.layouts.main')
@section('content')



<div class="card">
   
    <!-- /.card-header -->
    <div class="card-body">
      <table id="example1" class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>T/N</th>
          <th>Product name</th>
      
          <th>Price</th>
          <th>Short title</th>
          <th>Discount</th>
          <th>Count</th>
          <th>Image</th>
       
        </tr>
        </thead>
       
        <tbody>
            @foreach ($order as $r )
        <tr>

            <td>{{$r->id}}</td>
          <td>{{$r->name}}</td>
     

          <td>${{$r->price}}</td>
          <td>{{$r->short_titile}}</td>
          <td>{{$r->discount ?? "Mavjud emas!"}} </td>
          <td>{{$r->count}}</td>
      
          
            <?php
                                        $images = json_decode($r->image,true);
                                        ?>
           <td><img height="50px" src="{{asset('images')}}/{{$r->image}}" alt="rasm">
          </td>
          

          <td class="row" style="border:none;">
            <a href="{{route('orderView',['id' => $r->id])}}" class="btn btn-success mx-1"><i class ="fas fa-eye"></i></a>
            <a href="{{route('editOrder',['id' => $r->id])}}" class="btn btn-info mx-1"><i class="fa fa-pen"></i></a>
            <form action="{{ route('deleteOrder',['id' => $r->id])}}" method="POST">
              @csrf
              @method('DELETE')
                <button class="btn btn-danger"><i class="fas fa-trash"></i></button>
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



