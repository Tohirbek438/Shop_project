<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
class AdminUserController extends Controller
{

 
    public function userIndex(){
        $user = User::all();
        return view('admin.user-index',compact('user'));
    }

    public function userDelete($id){
      $user = User::find($id);
      $user->delete();
      return redirect('/admin/index');
    }
    public function userView($id){
      $user = User::find($id);
      return view('admin.user.edit',compact('user'));
    }

    public function adminShow($id){
      $admin = Admin::find($id);
      return view('admin.adminIndex.view',compact('admin'));
    }
    public function adminEdit($id){
      $admin = Admin::find($id);
      return view('admin.adminIndex.admin-edit',compact('admin'));
    }

    public function editAdmin(Request $request,$id){
      $admin = Admin::find($id);
      $admin->name = $request->input('name');
      $admin->email = $request->input('email');
      $admin->password = $request->input('password');
      if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('admin_image'), $filename);
        $admin->image = $filename;
       }
       $admin->save();
       return redirect('/admin/admin-index'); 
  }
  

}
