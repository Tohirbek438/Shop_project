@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Admin</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="{{route('saveAdmin')}}" method="POST" enctype="multipart/form-data">

                @csrf
              
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name">  
                    @error('name')
                    <span style="color:red;">{{$message}}</span>
                    @enderror
            </div>
                  
                  <div class="form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email">
                    
                    @error('email')
                    <span style="color:red;">{{$message}}</span>
                    @enderror   
                </div>
                
                <div class="form-group">
                    <label>Password</label>
                    <input type="text" class="form-control" name="password">
                    
                    @error('password')
                    <span style="color:red;">{{$message}}</span>
                    @enderror      
                </div>
                  <div class="form-group">
                   
                    <label>Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input"  name="image" >
                        <label class="custom-file-label">Choose file</label>
                      </div>
             
                    </div>
                    @error('image')
                    <span style="color:red;">{{$message}}</span>
                    @enderror  
                                                    
                  </div>
            
        
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>



@endsection