@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{ route('editAdmin',['id' => $admin->id])}}" method="POST" enctype="miltipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control"name="name" value="{{$admin->name}}">          
            </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" value="{{$admin->email}}">
                    
                                
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password">
                    
                                
                </div>
                  <div class="form-group">
                   
                    <label>Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" value="{{$admin->image}}">
                        <label class="custom-file-label">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                                                    
                  </div>
            
        
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



@endsection