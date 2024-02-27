@extends('admin.layouts.main')
@section('content')



<div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$blog->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$blog->name}}</td>
                </tr>
                <tr>
                    <th>Title</th>
                    <td>{{$blog->title}}</td>
                </tr>
                <tr>
                    <th>Short title</th>
                    <td>{{$blog->short_title}}</td>
                </tr>
                <tr>
                    <th>Admin</th>
                    <td>{{$blog->admin->name}}</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td>{{$blog->blogCategory->name}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td class="row mx-1"><img width="150px" height="100px" src="{{asset('blog_image/'.$blog->image)}}" alt="">

                  
                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$blog->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$blog->updated_at}}</td>

                </tr>
                </tbody></table>
        </div>
    </div>




@endsection