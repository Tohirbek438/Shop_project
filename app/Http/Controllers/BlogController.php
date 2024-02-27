<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Support\Facades\Auth;
class BlogController extends Controller

{
    public function blogIndex(){
        $blogs = Blog::all();
        return view('admin.blog.blog',compact('blogs'));
    }
    public function blogCategory(){
        $blogCategories = blogCategory::all();
        return view('admin.blog.blog-category',compact('blogCategories'));
    }
    public function createBlog(Request $request){
       $data = $request->validate([
        'name' => 'required',
        'title' => 'required',
        'short_title' => 'required',
        'category_id' => 'required',
        'admin_id' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
      ]);
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('blog_image'), $filename);
        $data['image'] = $filename;
       }
      Blog::create($data);  
    }
    public function blogMake(){
        $categories = BlogCategory::all();
        return view('admin.blog.blog-make',compact('categories'));
    }
   public function saveBlogCategory(Request $request){
    $data = $request->validate(['name' => 'required','title' => 'required']);
    BlogCategory::create($data);
    return redirect('/admin/blog-category');
}
public function createCategory(){
    return view('admin.blog.create-blog-category');
}

 public function adminblogView($id){
    $blog = Blog::find($id);
    return view('admin.blog.blog-view',compact('blog'));
 }
 public function blogDelete($id){
    $blog = Blog::find($id);
    if($blog->delete()){
      return redirect('/admin/blog');
    }
    else{
        return redirect('/admin/blog');
    }
 }
 public function adminblogEdit($id){
    $blog = Blog::find($id);
    $categories = BlogCategory::all();
    return view('admin.blog.blog-edit',compact('blog','categories'));
 }
 public function EditSaveBlog(Request  $request, $id){
   $blog = Blog::find($id);
   $blog->name = $request->input('name');
   $blog->title = $request->input('title');
   $blog->short_title = $request->input('short_title');
   $blog->category_id = $request->input('category_id');
   $blog->admin_id = $request->input('admin_id');
   if($request->hasFile('image')) {
    $file = $request->file('image');
    $filename = date('YmdHi') . $file->getClientOriginalName();
    $file->move(public_path('blog_image'), $filename);
    $blog->image = $filename;
   }

   $blog->save();

   return redirect('/admin/blog');


 }


}
