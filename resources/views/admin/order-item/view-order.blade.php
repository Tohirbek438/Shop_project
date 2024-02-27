@extends('admin.layouts.main')
@section('content')

<div class="card card-outline card-primary">
        <div class="card-header">

        </div>
        <div class="card-body table-responsive" style="display: block;">
            <table class="table table-bordered">
                <tbody><tr>
                    <th>Id</th>
                    <td>{{$model->id}}</td>
                </tr>
                <tr>
                    <th>First Name</th>
                    <td>{{$model->first_name}}</td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td>{{$model->last_name}}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{$model->email}}</td>
                </tr>
                <tr>
                    <th>Phone</th>
                    <td>{{$model->phone}}

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{$model->country}}

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td>{{$model->product_name}}

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Summa</th>
                    <td>{{$model->sum}}$

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Status</th>
                    <td><span style="font-size:15px;" class="{{$model->status == 'active' ? 'badge badge-success' : 'badge badge-danger'}}">{{$model->status}}</span>

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Image</th>
                    <td> <img src="{{asset('images/'.$model->image)}}" alt="rasm">

                  
                    </td>
                  
                </tr>
                <tr>
                    <th>Count</th>
                    <td>{{$model->count}}

                  
                    </td>
                  
                </tr>
                
                </tr>
                <tr>
                    <th>Created at</th>
                    <td>{{$model->created_at}}</td>
                </tr>
                <tr>
                    <th>Updated at</th>
                    <td>{{$model->updated_at}}</td>
                </tr>
                </tbody></table>
        </div>
    </div>


@endsection