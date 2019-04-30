<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\supplies\supplies;
use App\Http\Requests\supplies\updatesupplies;
use App\Models\Supplier;
use App\Models\Supply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class suppliesController extends Controller
{
    protected $view_path = 'admin/supplies';
    protected $model;
    protected $panel = 'Supply';
    protected $base_route='admin.supplies';
    protected $folder = 'supplies';
    protected $folder_path;


    public function __construct(){
        $this->model = new Supply();

        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function listSupply(){
        $data = [];
        $data['rows']=$this->model->select('supplies.id','company_name','product_name','quantity_size','price','delivered_date','supplier_id','supplies.image',
            'invoice_no','status')
            ->join('suppliers','suppliers.id','=','supplies.supplier_id')
            ->orderBy('delivered_date', 'desc')
            ->where(function ($query) {
                if (request()->has('product_name') && request()->get('product_name')) {
                    $query->where('product_name', 'like', '%'.request()->get('product_name').'%');
                }
                if (request()->has('price') && request()->get('price')) {
                    $query->where('price', 'like', '%'.request()->get('price').'%');
                }
                if (request()->has('quantity_size') && request()->get('quantity_size')) {
                    $query->where('quantity_size', 'like', '%'.request()->get('quantity_size').'%');
                }
                if (request()->has('company_name') && request()->get('company_name')) {
                    $query->where('company_name', 'like', '%' . request()->get('company_name') . '%');
                }
                if (request()->has('status') && request()->get('status')) {
                    $query->where('status', 'like', '%'  . request()->get('status') . '%' );
                }
                if (request()->has('delivered_date') && request()->get('delivered_date')) {
                    $query->where('delivered_date', 'like', request()->get('delivered_date').'%');
                }
                if (request()->has('invoice_no') && request()->get('invoice_no')) {
                    $query->where('invoice_no', 'like', request()->get('invoice_no').'%');
                }
            })
            ->paginate(25);
        return view($this->view_path.'.listSupply',compact('data'));
    }

    public function editSupply($id){
        $data =[];
        $data['row']= $this->model->find($id);
        $data['supplier']=Supplier::select('id','company_name')
            ->orderBy('company_name','asc')
            ->get();

        return view($this->view_path . '.editSupply',compact('data'));
    }
    public function store(supplies $request){
        $image=null;
        if($request->hasFile('image')){
            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();

            //uploading image in folder
            $file->move($this->folder_path,$image);
        }
        $this->model->create([
            'product_name'=>$request->get('product_name'),
            'quantity_size'=>$request->get('quantity'),
            'price'=>$request->get('price'),
            'delivered_date'=>$request->get('delivered_date'),
            'supplier_id'=>$request->get('supplier'),
            'invoice_no'=>$request->get('invoice_no'),
            'status'=>$request->get('status'),
            'image'=>$image
        ]);
        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.list');

    }

    public function updateSupply(updatesupplies $request, $id){

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
            'product_name'=>$request->get('product_name'),
            'quantity_size'=>$request->get('quantity'),
            'price'=>$request->get('price'),
            'delivered_date'=>$request->get('delivered_date'),
            'supplier_id'=>$request->get('supplier'),
            'invoice_no'=>$request->get('invoice_no'),
            'status'=>$request->get('status'),
            'image'=>$data['row']->image
        ]);
        $request->session()->flash('success_message',$this->panel.' Updated Successfully');
        return redirect()->route($this->base_route.'.list');
    }

    public function deleteSupply(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.list');

    }
}
