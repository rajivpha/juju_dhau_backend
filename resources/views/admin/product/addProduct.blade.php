@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Product Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
           'data' =>[
           'panel'=> 'Product',
           'panel_url'=>route('admin.product.add'),
           'current_panel' =>'Add Products'
           ]
           ])
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content mt-3">

                @include('admin.includes.errormsg')

                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.product.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="product_name"> Product Name </label>

                        <div class="col-sm-9">
                            <input type="text"  name='product_name'  placeholder="Product Name" class="col-xs-10 col-sm-5" />

                            @if ($errors->has('product_name'))
                                <span>{{ $errors->first('product_name') }}</span>
                            @endif

                        </div>
                    </div>





                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="quantity"> Quantity </label>

                        <div class="col-sm-9">
                            <input type="text"  name='quantity' placeholder="Quantity" class="col-xs-10 col-sm-5" />
                            @if ($errors->has('quantity'))
                                <span>{{ $errors->first('quantity') }}</span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="price1">Price</label>

                        <div class="col-sm-9">
                            <input type="text" name="price"  placeholder="Price" class="col-xs-10 col-sm-5" />
                            @if ($errors->has('price'))
                                <span>{{ $errors->first('price') }}</span>
                            @endif
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="category_id">Category</label>
                        <div class="col-sm-9">
                            <select name="category_id" class="col-xs-10 col-sm-5" />
                            @if(isset($data['categories']))
                                 @foreach($data['categories'] as $category )
                                     <option value="{{$category->id}}" >{{$category->category_name}}</option>
                                @endforeach
                            @else
                                    <option value="">No Categories Defined</option>
                            @endif
                        </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="manudate">Manufacture Date</label>

                        <div class="col-sm-9">
                            <input type="date" name="manudate"    class="col-xs-10 col-sm-5" />
                            @if ($errors->has('manudate'))
                                <span>{{ $errors->first('manudate') }}</span>
                            @endif
                        </div>
                    </div>


                  <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="expirydate">Expiry Date</label>

                        <div class="col-sm-9">
                            <input type="date" name="expirydate" id="exp_date"  class="col-xs-10 col-sm-5" />
                            @if ($errors->has('expirydate'))
                                <span>{{ $errors->first('expirydate') }}</span>
                            @endif
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="image">Image</label>

                        <div class="col-sm-9">
                            <input type="file" name="image"  class="col-xs-10 col-sm-5" />
                        </div>
                    </div>



                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="status">Status</label>

                        <div class="col-sm-9">
                            <select name="status" class="col-xs-10 col-sm-5" />
                                <option value="1" >In Stock</option>
                                <option value="0" >Out of Stock</option>

                            </select>

                        </div>
                    </div>


                    <div class="clearfix form-actions">
                        <div class="col-md-offset-3 col-md-9">
                            <button class="btn btn-info" type="submit">
                                <i class="icon-ok bigger-110"></i>
                                Submit
                            </button>

                            <button class="btn" type="reset">
                                <i class="icon-undo bigger-110"></i>
                                Reset
                            </button>
                        </div>
                    </div>









                </form>




            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div><!-- /.main-content -->




    </div><!-- /#ace-settings-container -->


    @endsection

