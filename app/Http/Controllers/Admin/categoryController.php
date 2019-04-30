<?php

namespace App\Http\Controllers\Admin;

    use App\Http\Requests\product\addFormValidation;
    use App\Http\Requests\product\updateFormValidation;
    use App\Models\Category;
    use App\Http\Controllers\Controller;
    use App\Http\Requests;
    use Illuminate\Http\Request;
    use Auth;

class categoryController extends Controller
{
    protected $view_path = 'admin/category';
    protected $model;
    protected $panel = 'Category';
    protected $base_route='admin.category';
    protected $folder = 'categories';
    protected $folder_path;




    public function __construct(){
        $this->model = new Category();

        $this->folder_path = public_path().DIRECTORY_SEPARATOR.'image'.DIRECTORY_SEPARATOR.$this->folder;



        $this->middleware('auth:admins'); //only lets you login if you entered username and password already
    }

    public function view(){

        $data = [];
        $data['rows'] =$this->model->select('id','category_name','image','status')->get();

        return view($this->view_path.'.viewCategory',compact('data')); //compact transfer all data from $data

    }

    public function add(){
        return view($this->view_path.'.addCategory');

    }

    public function store(Requests\category\addFormValidation $request)
    {

        //dd($request->all());
        $image=null;

        if($request->hasFile('image')){


            $file=$request->file('image');
            $image=mt_rand(1001,9999)."_".$file->getClientOriginalName();

            //uploading image in folder
            $file->move($this->folder_path,$image);

        $this->model->create([
            'category_name'=>$request->get('category_name'),
            'status'=>$request->get('status'),
            'image'=>$image

        ]);
        }
        $request->session()->flash('success_message',$this->panel.' Added Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function edit( $id)
    {

        $data =[];
        $data['row']= $this->model->find($id);


        return view($this->view_path . '.editCategory',compact('data'));
    }

    public function update(Requests\category\updateFormValidation $request, $id){

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
            'category_name'=>$request->get('category_name'),
            'status'=>$request->get('status'),
            'image'=>$data['row']->image
        ]);

        $request->session()->flash('success_message',$this->panel.' Updated Successfully');
        return redirect()->route($this->base_route.'.view');
    }

    public function delete(Request $request, $id){

        $data =[];
        $data['row']= $this->model->find($id);


        if($data['row']->image)
            unlink($this->folder_path.DIRECTORY_SEPARATOR.$data['row']->image);

        $data['row']->delete();

        $request->session()->flash('success_message',$this->panel.' Deleted  Successfully');
        return redirect()->route($this->base_route.'.view');

    }
}
