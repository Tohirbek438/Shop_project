@extends('admin.layouts.main')
@section('content')

<div class="card card-outline card-primary">


        <div class="card-header">
        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$admin->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$admin->name}}</td>
                </tr>
                
                <tr>
                    <th>Email</th>
                    <td>{{$admin->email}}</td>
                </tr>
                <tr>
                    <th>Image</th>
                    <td><img width="100px" height="80px" src="{{asset('admin_image/'.$admin->image)}}" alt="rasm"></td>
                </tr>
                
            
                <tr>
                    <th>Password</th>
                    <td class="row">{{bcrypt($admin->password)}}

                  
                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$admin->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$admin->updated_at}}</td>
                </tr>
                </tbody></table>
        </div>
    </div>


@endsection