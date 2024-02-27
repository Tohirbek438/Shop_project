<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
  

    public function category(){
      if(!Auth::guard('admin')->user()){
        return redirect('/admin/login');
      }
      $category = Category::all();
      return view('admin.category',compact('category'));
    }
    public function product(){
      if(!Auth::guard('admin')->user()){
        return redirect('/admin/login');
      }
        $product = Product::all();
        return view('admin.product',compact('product'));
      }

   public function createProduct(){
    if(!Auth::guard('admin')->user()){
      return redirect('/admin/login');
    }
    $category = Category::all();
    return view('admin.create-product',compact('category'));
   }

   public function saveProduct(Request $request){
    if(!Auth::guard('admin')->user()){
      return redirect('/admin/login');
    }
    $model = $request->validate([
       'name' => 'required',
       'title' => 'required',
       'nameuz' => 'required',
       'titleuz' => 'required',
       'weight' => 'required',
       'short_titleuz' => 'required',
       'short_title' => 'required',
       'price' => 'required',
       'image.*' => 'required|image|mimes:png,jpg,jpeg|max:5120',
       'category_id'=>'required',
       'status' => 'required'

    ]);

    $imageNames = [];
    $request->status = "active";
    if ($request->hasFile('image')) {
      $i = 0;
      foreach ($request->file('image') as $file) {
        $imageName = time().$i.'.'.$file->getClientOriginalExtension();
        $file->move(public_path('images'), $imageName);
        $imageNames[] = $imageName;
        $i++;
      }
    }
    $model['image'] = json_encode($imageNames);
    if (Product::create($model)) {
      
      return redirect('/admin/product');
    } else {
          
      return redirect()->back()->withInput();
    }
  }

    public function productShow($id){
      if(!Auth::guard('admin')->user()){
        return redirect('/admin/login');
      }
      $product = Product::find($id);
    return view('admin.product.product-view', compact('product'));
    }

    public function productEdit($id){
        $r = Product::find($id);
        $category = Category::all();
        return view('admin.product-edit',compact('r','category'));
    }
    public function productEditSave(Request $request){
        $model = $request->validate([
            'name' => 'required',
            'title' => 'required',
            'short_title' => 'required',
            'price' => 'required',
            'image.*' => 'image|mimes:png,jpg,jpeg|max:5120',
            'category_id'=>'required',
            'nameUz' => 'required',
            'titleUz' => 'required',
            'shortTitleUz' => 'required'

         ]);

         $imageNames = [];

         if ($request->hasFile('image')) {
           $i = 0;
           foreach ($request->file('image') as $file) {
             $imageName = time().$i.'_'.$file->getClientOriginalExtension();
             $file->move(public_path('images'), $imageName);
             $imageNames[] = $imageName;
             $i++;
           }
         }
         $model['image'] = json_encode($imageNames);
         if (Product::insert($model)) {
            return redirect()->route('products.index');
         } else {
           return redirect()->back()->withInput();
         }
    }

   public function deleteProduct($id){
    $product = Product::find($id);
    $product->delete();

    return redirect('/admin/product');
   }




 public function adminCreate(Request $request){
   $data = $request->validate([
      'name' => 'required',
      'email' => 'required|email',
      'password' => 'required'
   ]);
   $data['role'] = 1;
   Admin::create($data);
   return redirect('/admin/index');
  }
public function adminIndex(){
  $admin = Admin::all();
  return view('admin.admin-index',compact('admin'));
}


}

