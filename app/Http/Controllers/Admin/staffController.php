<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\staff\insertFormValidation;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class staffController extends Controller
{

    protected $view_path = 'admin/userManagement';
    protected $model;
    protected $folder = 'staffs';
    protected $folder_path;
    protected $base_route='admin.userManagement';
    protected $panel = 'Staff';

    public function __construct(){
    $this->model = new Staff();
    $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;

    $this->middleware('auth:admins'); //only lets you login if you entered username and password already
}

    public function addStaff(){
        $data = [];
        $data['rows'] =$this->model->select('id','first_name','middle_name','last_name','address',
            'contact_no','email','position','image')->get();


        return view($this->view_path.'.addStaff',compact('data'));

    }

    public function store(insertFormValidation $request){
        $image=null;
        if($request->hasFile('image')){

            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();

            //uploading image in folder
            $file->move($this->folder_path,$image);
        }
        $this->model->create([
            'first_name'=>$request->get('first_name'),
            'middle_name'=>$request->get('middle_name'),
            'last_name'=>$request->get('last_name'),
            'address'=>$request->get('address'),
            'contact_no'=>$request->get('contact'),
            'email'=>$request->get('email'),
            'password'=>Hash::make($request->get('password')),
            'position'=>$request->get('position'),
            'admin_id'=>Auth::user()->id,
            'image'=>$image

        ]);
        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.addStaff');
    }

    public function deleteStaff(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.addStaff');

    }
}
