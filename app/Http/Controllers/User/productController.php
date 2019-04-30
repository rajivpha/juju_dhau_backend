<?php

namespace App\Http\Controllers\User;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class productController extends Controller
{
    protected $model;

    public function __construct(){
        $this->model = new Product();

    $this->middleware('auth');
}

    public function productView(){
        $data = [];
        $data['rows'] =Product::select('id','product_name','price','quantity_size','image',
            'category_id','mfd_date','expiry_date','status','created_at')
            ->orderBy('mfd_date', 'desc')
            ->where(function ($query) {

                if (request()->has('product_name') && request()->get('product_name')) {
                    $query->where('product_name', 'like', '%'.request()->get('product_name').'%');
                }


                if(request()->has('mfd_date') && request()->get('mfd_date')) {
                    $query->where('mfd_date', 'like', request()->get('mfd_date').'%');
                }
            })
            ->paginate(25);

        return view('user.product.viewProducts',compact('data'));
    }

    public function singleView($id)
    {
        $data =[];
        $data['row']= $this->model->find($id);

        return view( 'user.product.singleProductView',compact('data'));

    }

}
