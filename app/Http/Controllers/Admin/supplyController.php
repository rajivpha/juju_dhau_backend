<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\supplier\addFormValidation;
use Illuminate\Http\Request;
use Auth;
use App\Models\Supplier;


use App\Http\Controllers\Controller;

class supplyController extends Controller
{
    protected $view_path = 'admin/supplies';
    protected $model;
    protected $panel = 'Supplier';
    protected $base_route='admin.supplies';
    protected $folder = 'supplier';
    protected $folder_path;


    public function __construct(){
        $this->model = new Supplier();

        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function viewSuppliers(){

        $data = [];
$data['rows']=$this->model->select('id','first_name','middle_name','last_name','company_name','address','contact_no','image',
    'email','goods_supplied')->get();


        return view($this->view_path.'.supplierList',compact('data'));
    }

    public function addSupply(){
        $data=[];
        $data['supplier']=Supplier::select('id','company_name')
            ->orderBy('company_name','asc')
            ->get();
        return view($this->view_path.'.addSupply',compact('data'));

    }

    public function storeSupplier(addFormValidation $request){

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
            'company_name'=>$request->get('company_name'),
            'address'=>$request->get('address'),
            'contact_no'=>$request->get('contact_no'),
            'email'=>$request->get('email'),
            'admin_id'=>Auth::user()->id,
            'goods_supplied'=>$request->get('goods_supplied'),
            'image'=>$image
        ]);
        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.supply');
    }

    public function deleteSupplier(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.supply');

    }
}
