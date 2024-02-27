<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class CategoryController extends Controller
{
 
    public function createCategory(Request $request){
      if(!Auth::guard('admin')->user()){
        return redirect('/admin/login');
      }
      $data = $request->validate([
        'name' => 'required',
        'title' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
        'status' => 'required'
    ]);
    
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi') . $file->getClientOriginalName();
        $file->move(public_path('category_image'), $filename);
        $data['image'] = $filename;
       
       }

      
    Category::create($data);
    return redirect('/admin/category');
 
     
    }
    public function createIndex(){
     
        return view('admin.category.create-index');
    }
//edit
    public function editCategory(Request $request,$id){
     
        $category = Category::find($id);
        $category->name = $request->input('name');
        $category->title = $request->input('title');
        $category->status = $request->input('status');
        if ($request->hasFile('image')) {
          $file = $request->file('image');
          $filename = date('YmdHi').$file->getClientOriginalName();
          $file->move(public_path('category_image'), $filename);
          $category->image = $filename;
         }
         $category->save();
         return redirect('/admin/category'); 
    }
    public function editIndex($id){
        $category = Category::find($id);
        return view('admin.category.edit-category',compact('category'));
    }
    public function deleteCategory($id){
      $category = Category::find($id);
      $category->delete();
      return redirect('/admin/category');

    }






  }




