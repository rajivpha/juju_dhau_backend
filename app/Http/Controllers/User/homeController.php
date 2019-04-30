<?php

namespace App\Http\Controllers\User;

use App\Models\Category;

use Mail;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Banner;
use Session;
use Auth;

class homeController extends Controller
{
    protected $model;

    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index(){
        $data = [];
        $data['banners'] = Banner::select('image', 'alt_text', 'caption','created_at')
            ->where('status','1')
            ->orderBy('rank','asc')
            ->limit(5)
            ->get();

        $data['categories'] = Category::select('image', 'category_name')
            ->where('status','1')
            ->get();
        return view('user.landingPage',compact('data'));
    }

    public function contactUs(){
        return view('user.contactus');
    }


}
