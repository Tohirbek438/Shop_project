<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
class AdminLoginController extends Controller
{

    public function login(){
        return view('admin.login');
    }
    public function index(){
        return view('admin.index');
    }

    public function kirish(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect('/admin/index');
        }

        return redirect()->back()->withInput()->withErrors(['email' => 'Invalid email or password']);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/admin/login');
    }

   public function saveAdmin(Request $request){
     
    $data = $request->validate([
        'name' => 'required|min:8',
        'email'=>'required|email',
        'password' => 'required',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', 
 

    ]);
    $data['role'] = 1;
    $data['parol'] = $request->input('password');
    $data['password'] = bcrypt($request->input('password'));
    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('admin_image'), $filename);
        $data['image'] = $filename;
       }

    Admin::create($data);
    return redirect('/admin/admin-index');
  
}

   public function deleteAdmin($id){
    
   $admin = Admin::find($id);
   $admin->delete();
   return redirect('/admin/admin-index');
   

   }









}
