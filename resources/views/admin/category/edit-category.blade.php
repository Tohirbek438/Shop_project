@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('edit.category',['id' => $category->id])}}" method="POST" enctype="miltipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control"name="name" value="{{$category->name}}">          
            </div>
                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title" value="{{$category->title}}">
                    
                                
                </div>
                  <div class="form-group">
                   
                    <label>Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" value="{{$category->image}}">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                                                    
                  </div>
              <div class="form-group">
              <label>Status</label>
                <input type="checkbox" name="status" checked data-bootstrap-switch>
                        </div>
        
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



@endsection