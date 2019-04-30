<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class orderController extends Controller
{
    protected $model;
    protected $panel = 'Order';
    protected $view_path = 'admin/order';



    public function __construct(){
        $this->model = new Order();

    $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function pending(){
        $data= [];
        $data['rows']= $this->model->select('orders.id','users.name as user_name','product_name','quantity','orders.approval','order_date')
            ->join('users','users.id','=','orders.user_id')
        ->Where(function ($query) {

            if (request()->has('product_name') && request()->get('product_name')) {
                $query->Where('product_name', 'like', '%' . request()->get('product_name') . '%');
            }

            if (request()->has('order_date') && request()->get('order_date')) {
                $query->Where('order_date', 'like', '%' . request()->get('order_date') . '%');
            }

            if (request()->has('user_name') && request()->get('user_name')) {
                $query->Where('user_name', 'like', '%' . request()->get('user_name') . '%');
            }
        })

        ->where('orders.approval','0')
        ->orderByRaw('order_date asc')
        ->get();


        return view($this->view_path.'.pendingOrder',compact('data'));
    }

    public function approved(){

        $data= [];
        $data['rows']= $this->model->select('orders.id','users.name as user_name','product_name','quantity','orders.approval','order_date')
            ->join('users','users.id','=','orders.user_id')
            ->Where(function ($query) {

                if (request()->has('product_name') && request()->get('product_name')) {
                    $query->Where('product_name', 'like', '%' . request()->get('product_name') . '%');
                }

                if (request()->has('order_date') && request()->get('order_date')) {
                    $query->Where('order_date', 'like', '%' . request()->get('order_date') . '%');
                }

                if (request()->has('user_name') && request()->get('user_name')) {
                    $query->Where('user_name', 'like', '%' . request()->get('user_name') . '%');
                }
            })

            ->where('orders.approval','1')
            ->orderByRaw('order_date asc')
            ->get();



        return view($this->view_path.'.approvedOrder',compact('data'));
    }

    public function orderApproval(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);

        $data['row']->update([
            'approval'=>$request->get('approval'),
        ]);

         $request->session()->flash('success_message',$this->panel.' approved ');
        return redirect()->route('admin.order.approved');

    }
}
