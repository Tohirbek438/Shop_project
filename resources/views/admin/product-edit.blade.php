@extends('admin.layouts.main')
@section('content')





<div class="card">
    <h3></h3>
    <div class="card-header p-2">
      <ul class="nav nav-pills">
        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">eng</a></li>
        <li class="nav-item"><a class="nav-link" href="#settings" data-toggle="tab">uz</a></li>
      </ul>
    </div>
    <div class="card-body">
      <div class="tab-content" id="tab">


                <form action="{{route('product-edit-save')}}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input type="text" name="name" value="{{$r->name}}" class="form-control" placeholder="">
                    </div>


                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" value="{{$r->title}}" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Short Title</label>
                        <input type="text" name="short_title" value="{{$r->short_title}}" class="form-control"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Price</label>
                        <input type="number" name="price" class="form-control" value="{{$r->price}}"  placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Discount</label>
                        <input type="number" name="discount" class="form-control" value="{{$r->discount}}"  placeholder="">
                      </div>

                    <div class="form-group">
                        <label>Image</label>
                        <div class="col-md-10 row">
                            <?php
                            $images = json_decode($r->image, true); ?>
                            @foreach ($images as $image )
                            <div class="alert alert-light mx-2">
                            <img src="{{asset('images')}}/{{$image}}" width="100px" alt="">
                        </div>
                            @endforeach

                        </div>


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
                      </div>
                    <div id="screen">
                      <div class="form-group">
                        <label>Maxsulot nomi</label>
                        <input type="text" name="nameUz" class="form-control" value="{{$r->nameUz}}" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>TitleUz</label>
                        <input type="text" name="titleUz" class="form-control" value="{{$r->titleUz}}" placeholder="">
                      </div>
                      <div class="form-group">
                        <label>ShortTitleUz</label>
                        <input type="text" name="short_titleUz" class="form-control" value="{{$r->short_titleUz}}" placeholder="">
                      </div>
                    </div>





                    <button type="submit" class="btn btn-primary">Save Product</button>

                </form>



        <!-- /.tab-pane -->
      </div>

    </div>
  </div>














@endsection




