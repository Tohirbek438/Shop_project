@extends('admin.layouts.main')
@section('content')

<div class="card-body">
  <a href="{{ route('blogMake')}}" class="btn btn-primary my-2 btn-lg" style="float:right;">Add blog</a>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <th>T/N</th>
        <th>Name</th>
        <th>Title</th>
        <th>Short title</th>
        <th>Admin</th>
        <th>Category</th>
   
        <th>Buttons</th>
      </tr>
      </thead>
      <tbody>
        @foreach($blogs as $blog)
      <tr>
        <td>{{$blog->id}}</td>
        <td>{{$blog->name}}</td>
        <td>
        {{$blog->title}}
        </td>
        <td>
          {{$blog->short_title}}
        </td>
        <td>
            {{$blog->admin->name}}
        </td>
        <td>
            {{$blog->blogCategory->name}}
        </td>
     
        <td class="row" style="width:150px;border:none;">
      
        <a  class="btn btn-success btn-sm" href="{{route('adminblogView',['id' => $blog->id])}}">
                              <i class="fas fa-eye">
                              </i> 
                          </a>
        <a  class="btn btn-info btn-sm" style="margin-left:5%"href="{{route('adminblogEdit',['id' =>$blog->id])}}">
                              <i class="fas fa-pencil-alt">
                              </i> 
                          </a>
          <form style="margin-left:5%" action="{{ route('blogDelete',['id' => $blog->id])}}" method="POST">
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