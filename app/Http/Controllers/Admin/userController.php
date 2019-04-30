<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class userController extends Controller
{
    protected $view_path = 'admin/userManagement';
    protected $model;

    public function __construct(){
        $this->model = new User();

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function viewDealers(){

        $data= [];

        $data['rows']=User::Where(function ($query) {

                    if (request()->has('name') && request()->get('name')) {
                        $query->Where('name', 'like', '%' . request()->get('name') . '%');
                    }

                    if (request()->has('email') && request()->get('email')) {
                        $query->Where('email', 'like', '%' . request()->get('email') . '%');
                    }
                })
                ->where('approval','1')
                ->get();

            return view($this->view_path.'.dealersList',compact('data'));
        }

    public function dealerView($id){
        $data =[];
        $data['row']= $this->model->find($id);

        return view($this->view_path.'.dealerDetails',compact('data'));

    }

    public function dealerRequests(){
            $data= [];
            $data['rows']=User::Where(function ($query) {

                if (request()->has('name') && request()->get('name')) {
                    $query->Where('name', 'like', '%' . request()->get('name') . '%');
                }

                if (request()->has('email') && request()->get('email')) {
                    $query->Where('email', 'like', '%' . request()->get('email') . '%');
                }
            })
            ->where('approval','0')->get();


            return view($this->view_path.'.dealerRequests', compact('data'));
        }

    public function userApproval(Request $request, $id){

            $data =[];
            $data['row']= $this->model->find($id);

            $data['row']->update([
                'approval'=>$request->get('approval'),
                'admin_id'=>Auth::user()->id,
            ]);

           // $request->session()->flash('success_message',$this->panel.' User Approved ');
            return redirect()->route('admin.userManagement.dealerRequests');

        }
}

