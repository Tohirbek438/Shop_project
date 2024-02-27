@extends('admin.layouts.main')
@section('content')

<div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$contact->id}}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{$contact->name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$contact->email}}</td>
                </tr>
                <tr>
                    <th>Message</th>
                    <td>{{$contact->message}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td class="row">{{$contact->status == 0 ? "noactive" : "active"}}

                  
                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>2024-02-04 11:06:14</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>2024-02-06 05:39:58</td>
                </tr>
                </tbody></table>
        </div>
    </div>


@endsection