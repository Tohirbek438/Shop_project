<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\LikeCart;
use App\Models\BlogCategory;
use App\Models\Blog;
use Illuminate\Pagination\Paginator;
class SiteController extends Controller
{

     public function index(){
        $categories = Category::all();
        $blogs = Blog::all();
        $product = Product::all();
        $latestProducts = Product::orderBy('created_at','ASC')->take(4)->get();
        $newProducts = Product::orderBy('created_at','DESC')->take(4)->get();
        
        return view('site.index',compact('categories','product','latestProducts','newProducts','blogs'));
     }
     public function contact(){
        return view('site.contact');
     }
     public function blog(){
      $blog_categories = BlogCategory::all();
      $blogs = Blog::all();
      $latestBlog = Blog::latest()->get();
        return view('site.blog',compact('blog_categories','blogs','latestBlog'));
     }
     public function blogCategory(Request $request, $name=null){
      $blog_categories = BlogCategory::all();
      $category = BlogCategory::where('name',$name)->first();
      $blogs = Blog::where('category_id',$category->id)->get();
      $latestBlog = Blog::latest()->get();
    
    
      return view('site.blog',compact('blog_categories','blogs','latestBlog','category'));
     
   }

     public function blogView($id){
      $blog_categories = BlogCategory::all();
      $latestBlog = Blog::latest()->get();
      $blog = Blog::find($id);
      $category = BlogCategory::where('id',$blog->category_id)->first();


      return view('blog.view',compact('blog','blog_categories','latestBlog','category'));
     }

     public function blogSearch(Request $request){
      $blog_categories = BlogCategory::all();
      $latestBlog = Blog::latest()->get();
      $s = $request->input('search');
      $blogs = Blog::where('name','LIKE',"%{$s}%")->get();
      return view("search.search-blog",compact('blog_categories','blogs','latestBlog'));
  }






     public function shopGrid(Request $request,$name = null){
        $categorySelected = "";
        $categories = Category::orderBy('name','ASC')->where('status',1)->get();
        $products = Product::where('status',1);
        $latestProducts = Product::latest()->get();
        if (!empty($name)) {
        $category  = Category::where('name',$name)->first();
        $products = Product::where('category_id',$category->id);
     
        $categorySelected = $category->id;
       }
       $products = $products->orderBy('id','DESC');
       $products = $products->get();
       
       $data['categories'] = $categories;
       $data['products'] = $products;
       $data['latestProducts'] = $latestProducts;
       $data['categorySelected'] = $categorySelected;

       return view('site.shop-grid-category',$data);

     }
     public function showProducts(){
     Paginator::useBootstrapFour();
     $products = Product::all();
     $like_cart = LikeCart::select('category_id')->get();

     $categories = Category::all();

     $latestProducts = Product::latest()->get();

     return view('site.shop-grid',compact('products','categories','latestProducts','like_cart'));
   }
     public function productOne($id){
     $products = Product::find($id);
     $related_product = Product::where('category_id',$products->category_id)->get();
     return view('site.product-one',compact('products','related_product'));
    }
    
    
    
}
