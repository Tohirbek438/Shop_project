
@extends('admin.layouts.main')
@section('content')

<div class="card">
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">eng</a></li>
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">uz</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content">


                <form action="{{ route('admin.save-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                  <div class="card-body">


                    <div class="form-group">
                     
                        <label>Product Name</label>
                      <input type="text" name="name" class="form-control" placeholder="">
                      @error('name')
                      <span style="color:red;">{{$message}}</span>
                      @enderror
                    </div>


                    <div class="form-group">
                        
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control"  placeholder="">
                        @error('title')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                        
                        <label for="">Short Title</label>
                        <input type="text" name="short_title" class="form-control"  placeholder="">
                        @error('short_title')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                         
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control"  placeholder="">
                        @error('price')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                        
                        <label for="">Discount</label>
                        <input type="number" name="discount" class="form-control"  placeholder="">
                        @error('discount')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        
                        <label for="">Weight</label>
                        <input type="number" name="weight" class="form-control"  placeholder="">
                        @error('weight')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>

                    <div class="form-group">

                      <label>Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="image[]" multiple>
                          <label class="custom-file-label" >Choose file</label>

                        </div>

                      </div>
                    </div>
                    <div class="form-group">
                        
                        <label for="">Choose category</label>



                        <select class="form-control" name="category_id" id="">
                            @foreach ($category as $r )
                            <option value="{{$r->id}}">{{$r->name}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>

                      <div class="form-group">
                        
                        <label>Maxsulot nomi</label>
                        <input type="text" name="nameuz" class="form-control" placeholder="">
                        @error('nameuz')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                        
                        <label>TitleUz</label>
                        <input type="text" name="titleuz" class="form-control" placeholder="">
                        @error('titleuz')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>
                      <div class="form-group">
                        
                        <label>ShortTitleUz</label>
                        
                        <input type="text" name="short_titleuz" class="form-control" placeholder="">
                        @error('short_titleuz')
                        <span style="color:red;">{{$message}}</span>
                        @enderror
                    </div>

                      <div class="form-group">
                       
                        <label>Status</label>
                           <select name="status" id="" class="form-control">
                            <option value="active">active</option>
                            <option value="noactive">noactive</option>
                         </select>
                         @error('status')
                         <span style="color:red;">{{$message}}</span>
                         @enderror
                        </div>




                    <button type="submit" class="btn btn-primary">Save Product</button>

                </form>



        <!-- /.tab-pane -->
      </div>

    </div>
  </div>














@endsection
