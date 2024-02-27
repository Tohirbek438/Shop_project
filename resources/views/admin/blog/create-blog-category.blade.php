@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Blog</h3>
              </div>
              <form action="{{ route('saveBlogCategory')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('nasme')
                    <span style="color:red;">{{$message}}</span>  
                @enderror    
            </div>
                  <input type="hidden" name="admin_id" value="{{Auth::guard('admin')->user()->id}}">
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                    @error('title')
                    <span style="color:red;">{{$message}}</span>
                @enderror  
                </div>
             
            
              
             
       
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


@endsection