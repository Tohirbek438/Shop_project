@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Order</h3>
              </div>
              <form action="{{route('EditSaveOrder',['id' => $model->id])}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Product Name</label>
                    <input type="text" class="form-control" name="name" value="{{$model->name}}">
                
            </div>
                  <input type="hidden" name="admin_id" value="{{$model->user_id}}">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title"  value = "{{$model->title}} ">
                
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" class="form-control" name="price"  value = "{{$model->price}} ">
                
                </div>
                <div class="form-group">
                    <label>Short title</label>
                    <input type="text" class="form-control" name="short_titile"  value = "{{$model->short_titile}} ">
                
                </div>
                  
            
                         <div class="form-group">
                    <label>Count</label>
                    <input type="text" class="form-control" name="count" value="{{$model->count}}">
                     
                </div>

       
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save Order</button>
                </div>
              </form>
            </div>


@endsection