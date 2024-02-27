@extends('admin.layouts.main')
@section('content')

<div class="card-body">
  <a href="" class="btn btn-primary my-2 btn-lg" style="float:right;">Add category</a>
    <table id="example1" class="table table-bordered table-striped">
      <thead>      
        <th>T/N</th>
        <th>Name</th>
        <th>Title</th>
        <th>Status</th>
        <th>Buttons</th>
     
      </tr>
      </thead>
      <tbody>
        @foreach($order as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->name}}</td>
        <td>
        {{$r->title}}
        </td>
        <td>
          {{$r->status}}
        </td>
        <td>
        <a href="{{route('orderView',['id' => $r->id])}}"  class="btn btn-success">View</a>
          <a href="" class="btn btn-info">Edit</a>
          <a href="" class="btn btn-danger">Delete</a>
        </td>

      </tr>
      @endforeach

      </tbody>
      <tfoot>
      <tr>

      </tr>
      </tfoot>
    </table>
  </div>








@endsection
