<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Requests\product\addFormValidation;
    use App\Http\Requests\product\updateFormValidation;
    use App\Models\Category;
    use App\Models\Product;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use Illuminate\Http\Request;
    use Auth;
    use Session;


class productsController extends Controller
{
    protected $view_path = 'admin/product';
    protected $model;
    protected $panel = 'Product';
    protected $base_route='admin.product';
    protected $folder = 'products';
    protected $folder_path;


    public function __construct(){
        $this->model = new Product();

        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;

        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function viewProduct(){

        $data = [];
        $data['rows'] =$this->model->select('product.id','category.category_name','product_name','price','quantity_size','product.image',
            'category_id','mfd_date','expiry_date','product.status')
            ->join('category','category.id','=','product.category_id')
            ->orderBy('mfd_date', 'desc')
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
                if (request()->has('category_name') && request()->get('category_name')) {
                    $query->where('category.category_name', 'like', '%'.request()->get('category_name').'%');

                }
                if (request()->has('status') && request()->get('status')) {
                    $query->where('product.status', 'like', '%'.request()->get('status').'%');

                }
                
                if (request()->has('mfd_date') && request()->get('mfd_date')) {
                    $query->where('mfd_date', 'like', request()->get('mfd_date').'%');
                }

                if (request()->has('expiry_date') && request()->get('expiry_date')) {
                    $query->where('expiry_date', 'like', request()->get('expiry_date').'%');
                }

            })
            ->paginate(25);


        return view($this->view_path.'.viewProduct',compact('data')); //compact transfer all data from $data
    }

    public function addProduct(){
        $data=[];
        $data['categories']=Category::select('id','category_name')
            ->orderBy('category_name','asc')
            ->get();
        return view($this->view_path.'.addProduct',compact('data'));
    }

    public function store(addFormValidation $request)
    {
       $image=null;
        if($request->hasFile('image')){

            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();
            //uploading image in folder
            $file->move($this->folder_path,$image);

        $this->model->create([
            'product_name'=>$request->get('product_name'),
            'quantity_size'=>$request->get('quantity'),
            'price'=>$request->get('price'),
            'category_id'=>$request->get('category_id'),
            'mfd_date'=>$request->get('manudate'),
            'expiry_date'=>$request->get('expirydate'),
            'status'=>$request->get('status'),
            'admin_id'=>Auth::user()->id,
            'image'=>$image
        ]);
        }
        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function editProduct( $id)
    {
        $data =[];
        $data['row']= $this->model->find($id);
        $data['categories']=Category::select('id','category_name')
            ->orderBy('category_name','asc')
            ->get();
        return view($this->view_path . '.editProduct',compact('data'));
    }

    public function updateProduct(updateFormValidation $request, $id){
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
            'category_id'=>$request->get('category_id'),
            'mfd_date'=>$request->get('manudate'),
            'expiry_date'=>$request->get('expirydate'),
            'status'=>$request->get('status'),
            'admin_id'=>Auth::user()->id,
            'image'=>$data['row']->image
        ]);

        $request->session()->flash('success_message',$this->panel.' Updated Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function deleteProduct(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.view');

    }
}
