@extends('admin.layouts.main')
@section('content')

<div class="card-body">

    <table id="example1" class="table table-bordered table-striped">
      <thead>
      
        <th>T/N</th>
        <th>FirstName</th>
        <th>LastName</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Buttons</th>
     
      </tr>
      </thead>
      <tbody>
        @foreach($user as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->firstname}}</td>
        <td>
        {{$r->lastname}}
        </td>
        <td>
          {{$r->email}}
        </td>
        <td>
          {{$r->phone}}
        </td>
        <td class="row" style="border:none;">
        
          <a href="{{route('userView',['id' => $r->id])}}" class="btn btn-success mx-2 btn-sm">
            <i class="fas fa-eye"></i>
          </a>
          <form action="{{ route('userDelete',['id' => $r->id])}}" method="POST">
            @csrf
            @method('DELETE')
          <button  type="submit" class="btn btn-danger mx-2 btn-sm"><i class="fas fa-trash"></i></button>
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


