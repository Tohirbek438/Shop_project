
@extends('layouts.header')
@section('content')






<section class="blog-details-hero set-bg" data-setbg="/img/blog/details/details-hero.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="blog__details__hero__text">
                        <h2>{{$blog->name}}</h2>
                        <ul>
                            <li>By {{$blog->admin->name}}</li>
                            <li>{{$blog->created_at}}</li>
                          
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5 order-md-1 order-2">
                    <div class="blog__sidebar">
                        <div class="blog__sidebar__search">
                        <form action="{{route('blogSearch')}}" method="GET">
                            
                            <input style="padding-right: 40px;" type="text" placeholder="Search..." name="search" value="<?php if(isset($_GET['search'])): ?>
<?php echo trim($_GET['search'])?>
<?php else:?>
<?php echo ""?>
<?php endif?>">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="/blog">All</a></li>
                                @foreach($blog_categories as $r)
                                <li><a href="/blog/category/{{$r->name}}">{{$r->name}} ({{count($r->blogs)}})</a></li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($latestBlog as $r) 
                                <a href="{{route('blogView',['id' => $r->id])}}" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img width="100px" src="{{asset('blog_image/'.$r->image)}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$r->name}}</h6>
                                        <span>{{$r->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                              
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                            @foreach($blog_categories as $r)   
                            
                            <a href="/blog/category/{{$r->name}}">{{$r->name}}</a>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 order-md-1 order-1">
                    <div class="blog__details__text">
                        <img width="100%" src="{{asset('blog_image/'.$blog->image)}}" alt="">
                        <p>{{$blog->title}}</p>
                       
                    </div>
                    <div class="blog__details__content">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="blog__details__author">
                                    <div class="blog__details__author__pic">
                                        <img src="{{asset('admin_image/'.$blog->admin->image)}}" alt="">
                                    </div>
                                    <div class="blog__details__author__text">
                                        <h6>{{$blog->admin->name}}</h6>
                                        <span>Admin</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="blog__details__widget">
                                    <ul>
                                        <li><span>Categories:</span> {{$blog->blogcategory->name}}</li>
                                        <li><span>Tags:</span>All, @foreach($blog_categories as $r)
                                          {{$r->name}}
                                        @endforeach
                                        </li>
                                    </ul>
                                    <div class="blog__details__social">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                        <a href="#"><i class="fa fa-linkedin"></i></a>
                                        <a href="#"><i class="fa fa-envelope"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

    <!-- Related Blog Section Begin -->
    <section class="related-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related-blog-title">
                        <h2>Post You May Like</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($category->blogs as $r)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic">
                            <img width="180px" height="250px;" src="{{asset('blog_image/'.$r->image)}}" alt="">
                        </div>
                        <div class="blog__item__text">
                            <ul>
                                <li><i class="fa fa-calendar-o"></i>{{$r->created_at}}</li>
                                
                            </ul>
                            <h5><a href="{{route('blogView',['id' => $r->id])}}">{{$r->name}}</a></h5>
                            <p>
                                {{$r->short_title}} </p>
                        </div>
                    </div>
                </div>
                @endforeach
            
            </div>
        </div>
    </section>
    <!-- Related Blog Section End -->
@endsection