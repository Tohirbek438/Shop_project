@extends('admin.layouts.main')
@section('content')

<div class="card-body">
<a href="/admin/create" style="float:right;" class="btn btn-info my-2">Admin Create</a>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      
        <th>T/N</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
      
        <th>Buttons</th>
     
      </tr>
      </thead>
      <tbody>
        @foreach($admin as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->name}}</td>
        <td>
          {{$r->email}}
        </td>
        <td>
          {{$r->parol}}
        </td>
      
        <td class="row">
        <a href="{{route('adminShow',['id' => $r->id])}}" class="btn btn-info"><i class="fas fa-eye"></i></a>
          <a href="{{route('adminEdit',['id' => $r->id])}}" class="btn btn-success mx-2"><i class="fas fa-pen"></i></a>
          <form action="{{route('deleteAdmin',['id' =>$r->id])}}" method="POST">
            @csrf
            @method('DELETE')
          <button  type="submit" class="btn btn-danger mx-2"><i class="fas fa-trash"></i></button>
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
  </div>




@endsection


