<?php

namespace App\Http\Controllers\User;

use App\Http\Requests\order\addFormValidation;
use App\Http\Requests\order\updateFormValidation;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Mail;


class orderController extends Controller
{
    protected $model;
    protected $panel = 'Order';
    protected $base_route='user.order';

    public function __construct(){
        $this->model = new Order();

    $this->middleware('auth');
}

    public function orderList(){
        $data['rows']= $this->model->select('orders.id','users.name as user_name',
            'product_name','quantity','orders.approval','order_date')
        ->join('users','users.id','=','orders.user_id')
        ->orderBy('order_date', 'asc')
        ->where('orders.approval','0')
        ->where('user_id',Auth::user()->id)
        ->paginate(25);

   return view('user.order.orderList',compact('data'));
}

    public function approvedOrders(){

        $data = [];
        $data['rows']= $this->model->select('orders.id','users.name as user_name',
            'product_name','quantity','orders.approval','order_date','orders.created_at')
        ->join('users','users.id','=','orders.user_id')

            ->orderBy('order_date', 'asc')
            ->where('orders.approval','1')
            ->where('user_id',Auth::user()->id)
            ->paginate(25);

        return view('user.order.approvedOrders',compact('data'));
    }

    public function placeOrder(){

    return view('user.order.placeOrder',compact('data'));
}

    public function addOrder(addFormValidation $request){

    $data=array(
        'email'=>Auth::user()->email,
        'name'=>Auth::user()->name,
        'quantity'=> $request->get('quantity_size'),
        'product'=> $request->get('product_name'),
        'date'=> $request->get('order_date')
    );
    Mail::send('user.email.orderMail',$data,function($message) use($data){
        $message->from($data['email']);
        $message->to('jujukhwopa@gmail.com','Khwopa JuJu Dhau');
        $message->subject('New Order');
    });
        $this->model->create([
            'product_name'=>$request->get('product_name'),
            'quantity'=>$request->get('quantity_size'),
            'user_id'=>Auth::user()->id,
            'order_date'=>$request->get('order_date'),
        ]);

$request->session()->flash('success_message',$this->panel.' is place Successfully. It needs approval before processing');
return redirect()->route($this->base_route.'.list');
}

    public function editOrder($id){
    $data =[];
    $data['row']= $this->model->find($id);

    return view( 'user.order.editOrder',compact('data'));
    }

    public function updateOrder(updateFormValidation $request, $id){
    $data =[];
    $data['row']= $this->model->find($id);
    if(!$data['row']){
        $request->session()->flash('error_message','Invalid Request');
        return redirect()->route($this->base_route.'view');
    }

    $data['row']->update([
        'product_name'=>$request->get('product_name'),
        'quantity'=>$request->get('quantity_size'),
        'user_name'=>Auth::user()->id,
        'order_date'=>$request->get('order_date'),
    ]);

    $data=array(
        'email'=>Auth::user()->email,
        'name'=>Auth::user()->name,
        'quantity'=> $request->get('quantity_size'),
        'product'=> $request->get('product_name'),
        'date'=> $request->get('order_date')
    );
    Mail::send('user.email.revisedOrderMail',$data,function($message) use($data){
        $message->from($data['email']);
        $message->to('jujukhwopa@gmail.com','Khwopa JuJu Dhau');
        $message->subject('Revised Order');
    });

    $request->session()->flash('success_message',$this->panel.' is updated successfully');
        return redirect()->route($this->base_route.'.list');
    }

    public function cancelOrder(Request $request, $id){
    $data =[];
    $data['row']= $this->model->find($id);

    $order_date = $data['row']->order_date;
    $product_name= $data['row']->product_name;
    $quantity = $data['row']->quantity;

    $data['row']->delete();

    $data=array(
        'email'=>Auth::user()->email,
        'name'=>Auth::user()->name,
        'quantity'=> $quantity,
        'product'=> $product_name,
        'date'=> $order_date
    );
    Mail::send('user.email.cancelOrderMail',$data,function($message) use($data){
        $message->from($data['email']);
        $message->to('jujukhwopa@gmail.com','Khwopa JuJu Dhau');
        $message->subject('Cancel Order');
    });


    $request->session()->flash('success_message',$this->panel.' Cancelled  Successfully');
    return redirect()->route($this->base_route.'.list');
}
}
