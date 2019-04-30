<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\register\register;
use App\Http\Requests\register\registerUser;
use App\Http\Requests\RegisterValidation;
use App\User;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:web');
    }

    public function showRegisterForm(){
        return view('auth.register');
    }

    public function register(registerUser $request)
    {
        $image=null;
        if($request->hasFile('image')) {
            $file = $request->file('image');
            $image =mt_rand(0,9999)."_". $file->getClientOriginalName();
            //uploading image name in folder
            $file->move('images',$image);
        }
        User::create([
            'middle_name'=>$request->get('middle_name'),
            'last_name'=>$request->get('last_name'),
            'name'=>$request->get('name'),
            'first_name'=>$request->get('first_name'),
            'address'=>$request->get('address'),
            'contact_no'=>$request->get('contact_no'),
            'email'=>$request->get('email'),
            'password'=>bcrypt($request->get('password')),
            'image'=>$image,
        ]);
        $request->session()->flash('success_message','Your details has been sent for verification. We will contact you soon');
        return redirect()->route('user.register.show');

    }
}
