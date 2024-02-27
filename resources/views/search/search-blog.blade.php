@extends('layouts.header')
@section('content')

<section class="breadcrumb-section set-bg" data-setbg="/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Blog</h2>
                        <div class="breadcrumb__option">
                            <a href="/">Home</a>
                            <span>Blog</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Blog Section Begin -->
    <section class="blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-5">
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
                                @foreach($blog_categories as $category)
                                <li><a href="/blog/category/{{$category->name}}">{{$category->name}} ({{count($category->blogs)}})</a></li>
                               
                                @endforeach
                            </ul>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Recent News</h4>
                            <div class="blog__sidebar__recent">
                                @foreach($latestBlog as $blog)
                                <a href="" class="blog__sidebar__recent__item">
                                    <div class="blog__sidebar__recent__item__pic">
                                        <img width="100px" height="80px" src="{{asset('blog_image/'.$blog->image)}}" alt="">
                                    </div>
                                    <div class="blog__sidebar__recent__item__text">
                                        <h6>{{$blog->name}}</h6>
                                        <span>{{$blog->created_at}}</span>
                                    </div>
                                </a>
                                @endforeach
                            
                            </div>
                        </div>
                        <div class="blog__sidebar__item">
                            <h4>Search By</h4>
                            <div class="blog__sidebar__item__tags">
                                @foreach($blog_categories as $r)
                                <a href="/blog/{{$r->name}}">{{$r->name}}</a>
                                
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7">
                @if($blogs->isEmpty())
                <div class="alert alert-danger" style="margin-top:6%;">Blogs are not available </div>
                   @else
                    <div class="row">
                        @foreach($blogs as $blog)
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="blog__item">
                                <div class="blog__item__pic">
                                    <img src="{{asset('blog_image/'.$blog->image)}}" alt="">
                                </div>
                                <div class="blog__item__text">
                                    <ul>
                                        <li><i class="fa fa-calendar-o"></i> {{$blog->created_at}}</li>
                                        <li><i class="fa fa-comment-o"></i></li>
                                    </ul>
                                    <h5><a href="{{route('blogView',['id' => $blog->id])}}">{{$blog->name}}</a></h5>
                                    <p>{{$blog->title}}</p>
                                    <a href="{{route('blogView',['id' => $blog->id])}}" class="blog__btn">READ MORE <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                     
                        <div class="col-lg-12">
                  
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endsection