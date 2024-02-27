@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Category</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('create.category')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Category Name</label>
                    <input type="text" class="form-control"name="name">
                    @error('name')
                    <span style="color:red;">{{$message}}</span>  
                @enderror    
            </div>
                  
                  <div class="form-group">
                    <label>Title</label>
                    <input type="text" class="form-control" name="title">
                    @error('title')
                    <span style="color:red;">{{$message}}</span>
                @enderror  
                </div>
                  <div class="form-group">
                   
                    <label>Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                  
                    </div>
                    @error('image')
                    <span style="color:red;">{{$message}}</span>
                    @enderror
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