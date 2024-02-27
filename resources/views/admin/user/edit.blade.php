@extends('admin.layouts.main')
@section('content')

<div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$user->id}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{$user->firstname}}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{$user->lastname}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$user->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$user->phone}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td class="row">{{bcrypt($user->password)}}

                  
                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$user->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$user->updated_at}}</td>
                </tr>
                </tbody></table>
        </div>
    </div>


@endsection