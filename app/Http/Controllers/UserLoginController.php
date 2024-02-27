<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
class UserLoginController extends Controller
{
    public function signIn(Request $request){
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($credentials)){
            $request->session()->regenerate();
            return redirect('/')->with('message', 'Logged in successfully');
        }

        return back()->withErrors(['password' => 'Email yoki password xato']);
    }






    public function createUser(){


    return view('user.create-user');

}



          public function create(Request $request){
          $model = $request->validate([
          'firstname' => 'required',
          'lastname' => 'required',
          'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
          'email' => ['required','email', Rule::unique('users','email')],
          'password' => 'required|min:8'
            ]);
          $model['password'] = bcrypt($model['password']);
          $user = User::create($model);
          auth()->login($user);


            return redirect('/')->with('message','Logged in and created user succesfully');
        }

        public function logout(Request $request){
            auth()->logout();
            return redirect('/')->with('message','Logged out succesfully');
        }


        public function login(){

            return view('user.login');
        }









}
