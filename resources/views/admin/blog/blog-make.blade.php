@extends('admin.layouts.main')
@section('content')

<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Create Blog</h3>
              </div>
              <form action="{{ route('create.blog')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                  <div class="form-group">
                  
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" name="name">
                    @error('name')
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
                    <label>Short Title</label>
                    <input type="text" class="form-control" name="short_title">
                    @error('short_title')
                    <span style="color:red;">{{$message}}</span>
                @enderror  
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-control" name="category_id" id="category">
                        @foreach($categories as $category_blog)
                        <option value="{{$category_blog->id}}">{{$category_blog->name}}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                    <span style="color:red;">{{$message}}</span>
                @enderror  
                </div>
       
               

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>


@endsection