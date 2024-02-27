@extends('admin.layouts.main')
@section('content')
<div class="card-body">
@if($order_item->isEmpty())

<div class="alert alert-danger">Order Items is empty!</div>

@else
<table id="example1" class="table table-bordered table-striped">
      <thead>
        <th>T/N</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th></th>
       </tr>
      </thead>
      <tbody>
        @foreach($order_item as $r)
      <tr>
     
        <td>{{$r->id}}</td>
        <td>{{$r->first_name}}</td>
        <td>
        {{$r->last_name}}
        </td>
        <td>
        {{$r->email}}
        </td>
        <td>
        {{$r->phone}}
        </td>
        <td>
          {{$r->product_name}}
        </td>
        <td>
          {{$r->phone}}

          
        </td>
       
        <td class="row" style="border:none;">
        <a href="{{route('showOrderitem',['id' => $r->id])}}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a>
        <form class="mx-2" action="{{route('DeleteOrderitem',['id' => $r->id])}}" method="POST">
          @csrf  
          @method('DELETE')
        <button type="submit"  class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
        </form>
        </td>
      </tr>
      @endforeach
      </tbody>
      <tfoot>
      <tr>
      </tr>
      </tfoot>
    </table>
   
    @endif
  </div>

@endsection
