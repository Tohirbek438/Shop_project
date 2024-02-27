@extends('admin.layouts.main')
@section('content')

<div class="card-body">
  
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <th>T/N</th>
        <th>Name</th>
        <th>Title</th>
        <th>Message</th>
         <th>Status</th>
         <th>Buttons</th>
     
      </tr>
      </thead>
      <tbody>
        @foreach($contact as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->name}}</td>
        <td>
        {{$r->email}}
        </td>
        <td>
        {{$r->message}}
        </td>
        <td>
       
          {{$r->status == 1 ? "Active" : "Noactive"}}
        </td>
       
        <td class="row">
        <a  class="btn btn-info btn-sm" href="{{route('ContactView',['id'=>$r->id])}}">
                              <i class="fas fa-eye">
                              </i> 
                          </a>
          <form style="margin-left:5%" action="{{route('deleteContact',['id' => $r->id])}}" method="POST">
            @csrf
            @method('DELETE')
          <button type="submit"  class="btn btn-danger btn-sm"> <i class="fas fa-trash">
                              </i></button>
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
