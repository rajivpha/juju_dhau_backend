<?php

namespace App\Http\Controllers\Admin;


use App\Http\Requests\payment\received;
use App\Models\paymentReceived;
use Auth;
use App\Http\Controllers\Controller;
use App\User;

class paymentReceivedController extends Controller
{
    protected $view_path = 'admin/payment';
    protected $model;
    protected $panel = 'Payment';
    protected $base_route='admin.payment';


    public function __construct(){
        $this->model = new paymentReceived();

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function received(){

        $data = [];
        $data['rows'] =$this->model->select('payment_receiveds.id','users.name','received_date','receipt_no','received_amount','user_id')
            ->join('users','users.id','=','payment_receiveds.user_id')
                ->orderBy('received_date', 'desc')
                ->where(function ($query) {

                    if (request()->has('received_date') && request()->get('received_date')) {
                        $query->where('received_date', 'like', '%'.request()->get('received_date').'%');
                    }

                    if (request()->has('receipt_no') && request()->get('receipt_no')) {
                        $query->where('receipt_no', 'like', '%'.request()->get('receipt_no').'%');
                    }

                    if (request()->has('customer_name') && request()->get('customer_name')) {
                        $query->where('users.name', 'like', '%' . request()->get('customer_name') . '%');
                    }


                })
            ->paginate(25);
        $data['received']=User::select('id','name')
            ->where('approval','1')
            ->orderBy('name','asc')
            ->get();

        return view($this->view_path.'.paymentReceived',compact('data')); //compact transfer all data from $data

    }

    public function store(received $request)
    {
        //dd($request->all());

        $this->model->create([
            'received_date'=>$request->get('received_date'),
            'receipt_no'=>$request->get('receipt_no'),
            'received_amount'=>$request->get('received_amount'),
            'user_id'=>$request->get('customer_name'),


        ]);

        $request->session()->flash('success_message',$this->panel.' Received');
        return redirect()->route($this->base_route.'.received');
    }
}
