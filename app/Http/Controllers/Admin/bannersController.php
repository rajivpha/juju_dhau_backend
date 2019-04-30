<?php

namespace App\Http\Controllers\Admin;
use App\Http\Requests\banner\updateFormValidation;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Banner;
use Illuminate\Http\Request;
use Auth;


class bannersController extends Controller
{
    protected $view_path = 'admin/banner';
    protected $model;
    protected $panel = 'Banner';
    protected $base_route='admin.banners';
    protected $folder = 'banners';
    protected $folder_path;


    public function __construct(){
        $this->model = new Banner();

        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function bannerList(){

        $data = [];
        $data['rows'] =$this->model->select('id','rank','alt_text','caption','image',
            'status')->get();

        return view($this->view_path.'.bannerList',compact('data')); //compact transfer all data from $data

    }

    public function addBanner(){
        return view($this->view_path.'.addBanner');

    }

    public function store( Requests\banner\addformValidation $request){

        $image=null;
        if($request->hasFile('image')){

            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();

            //uploading image in folder
            $file->move($this->folder_path,$image);

        }

        $this->model->create([
            'alt_text'=>$request->get('alt_text'),
            'caption'=>$request->get('caption'),
            'rank'=>$request->get('rank'),
            'status'=>$request->get('status'),
            'admin_id'=>Auth::user()->id,
            'image'=>$image

        ]);

        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function editBanner($id){
        $data =[];
        $data['row']= $this->model->find($id);

        return view('admin.banner.editBanner',compact('data'));

    }

    public function updateBanner(Requests\banner\updateFormValidation $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);
        if(!$data['row']){
            $request->session()->flash('error_message','Invalid Request');
            return redirect()->route($this->base_route.'view');
        }

        if($request->hasFile('image')){

            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();

            //uploading image in folder
            $file->move($this->folder_path,$image);

            //removing previous image
            if($data['row']->image)
                unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

            $data['row']->image=$image;

        }

        $data['row']->update([
            'alt_text'=>$request->get('alt_text'),
            'caption'=>$request->get('caption'),
            'rank'=>$request->get('rank'),
            'admin_id'=>Auth::user()->id,
            'status'=>$request->get('status'),
            'image'=>$data['row']->image
        ]);

        $request->session()->flash('success_message',$this->panel.' Updated Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function deleteBanner(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.view');

    }
}
