<?php

namespace App\Http\Controllers\User;


    use Mail;
    use App\Models\Product;
    use App\Models\Category;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use Auth;
    use Session;


class dashboardController extends Controller
{

    public function __construct(){

        $this->middleware('auth');
    }

    public function userDash()
    {  $data['categories'] = Category::select('id','image', 'category_name')
        ->where('status','1')
        ->get();

        $data['rows'] =Product::select('id','product_name','price','quantity_size','image',
            'category_id','mfd_date','expiry_date','status')
            ->orderBy('mfd_date', 'desc')
            ->limit(9)
            ->get();


        return view('user.userDashboard',compact('data'));
    }

    public  function categoryProduct($id){
        $data=[];
        $data['category']=Category::find($id);

        $data['rows'] =Product::select('product.id','category.category_name','product_name','price','quantity_size','product.image',
            'category_id','mfd_date','expiry_date','product.status')
            ->join('category','category.id','=','product.category_id')
            ->orderBy('mfd_date', 'desc')
            ->where('product.category_id',$data['category']->id)
            ->get();

        return view('user.product.categoryProduct',compact('data'));

    }
}
