<?php

namespace App\Http\Controllers\Auth;


use App\Models\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    protected $model;

    public function __construct(){

        $this->middleware('guest:admins',['except'=>['logout']]);
    }

    public function showLoginForm(){
        return view('admin.Admin-login');
    }

    public function login(Request $request){

      $this->validate($request,[
          'email'=>'required|email',
          'password'=>'required|min:6'
      ]);

     if(Auth::guard('admins')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember))
     {
        return redirect()->intended(route('admin.dashboard'));
     }
        $request->session()->flash('message','Your detail is wrong. Please Verify.');
        return redirect()->route('admin.login')->withInput($request->only('email'));

    }

    public function logout()
    {
       Auth::guard('admins')->logout();

        return redirect('/');
    }


}
