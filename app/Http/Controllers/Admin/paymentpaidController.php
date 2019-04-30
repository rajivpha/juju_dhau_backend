<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\payment\paid;
use App\Models\paymentPaid;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class paymentpaidController extends Controller
{
    protected $view_path = 'admin/payment';
    protected $model;
    protected $panel = 'Payment';
    protected $base_route='admin.payment';



    public function __construct(){
        $this->model = new paymentPaid();

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function paid(){

        $data = [];
        $data['rows'] =$this->model->select('payment_paids.id','suppliers.company_name','paid_date','cheque_no','paid_amount','supplier')
            ->join('suppliers','suppliers.id','=','payment_paids.supplier')
            ->orderBy('paid_date', 'desc')
            ->where(function ($query) {

                if (request()->has('paid_date') && request()->get('paid_date')) {
                    $query->where('paid_date', 'like', '%'.request()->get('paid_date').'%');
                }

                if (request()->has('cheque_no') && request()->get('cheque_no')) {
                    $query->where('cheque_no', 'like', '%'.request()->get('cheque_no').'%');
                }

                if (request()->has('company_name') && request()->get('company_name')) {
                    $query->where('company_name', 'like', '%' . request()->get('company_name') . '%');
                }


            })
            ->paginate(25);

        $data['paid']=Supplier::select('id','company_name')
            ->orderBy('company_name','asc')
            ->get();

        return view($this->view_path.'.paymentPaid',compact('data')); //compact transfer all data from $data

    }

    public function store(paid $request)
    {
        //dd($request->all());

        $this->model->create([
            'paid_date'=>$request->get('paid_date'),
            'cheque_no'=>$request->get('cheque_no'),
            'paid_amount'=>$request->get('paid_amount'),
            'supplier'=>$request->get('supplier'),


        ]);

        $request->session()->flash('success_message',$this->panel.' Paid');
        return redirect()->route($this->base_route.'.paid');
    }


}
