@extends('admin.layouts.main')
@section('content')

<div class="card-body">
  <a href="{{ route('category.index')}}" class="btn btn-primary my-2 btn-lg" style="float:right;">Add category</a>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
      
        <th>T/N</th>
        <th>Name</th>
        <th>Title</th>
    
        <th>Status</th>
        <th>Image</th>
        <th>Buttons</th>
     
      </tr>
      </thead>
      <tbody>
        @foreach($category as $r)
      <tr>
        <td>{{$r->id}}</td>
        <td>{{$r->name}}</td>
        <td>
        {{$r->title}}
        </td>
        <td>
          @if($r->status == "on")
          active
          @else
          noactive
          @endif
          
        </td>
        <td>
          <image width="100px" height="100px" src="{{ asset('category_image')}}/{{$r->image}}" />
        </td>
        <td class="row project-actions text-right">
        <a  class="btn btn-info btn-sm" href="{{ route('edit.index',['id' => $r->id])}}">
                              <i class="fas fa-pencil-alt">
                              </i> 
                          </a>
          <form style="margin-left:5%" action="{{route('delete.category',['id' => $r->id])}}" method="POST">
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
