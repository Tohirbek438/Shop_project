@extends('admin.layouts.main')
@section('content')

<div class="card-body">
  <a href="{{ route('createCategory')}}" class="btn btn-primary my-2 btn-lg" style="float:right;">Add Blog Category</a>
    <table id="example1" class="table table-bordered table-striped">
      <thead>
        <th>T/N</th>
        <th>Name</th>
        <th>Title</th>
   
      </tr>
      </thead>
      <tbody>
        @foreach($blogCategories as $blog)
      <tr>
        <td>{{$blog->id}}</td>
        <td>{{$blog->name}}</td>
        <td>
        {{$blog->title}}
        </td>
        <td class="row project-actions text-right">
        <a  class="btn btn-info btn-sm" href="">
                              <i class="fas fa-pencil-alt">
                              </i> 
                          </a>
          <form style="margin-left:5%" action="" method="POST">
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