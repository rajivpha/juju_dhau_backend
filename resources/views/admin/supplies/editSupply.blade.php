@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Supply Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
                   'data' =>[
                   'panel'=> 'Supplies',
                   'panel_url'=>route('admin.supplies.list'),
                   'current_panel' =>'Update Supplies'
                   ]
                   ])

                        </ol>
                    </div>
                </div>
            </div>
        </div>




        <div class="content mt-3">
                    @include('admin.includes.errormsg')




                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.supplies.editSupply',$data['row']->id)}}"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="product_name"> Product Name </label>

                            <div class="col-sm-9">
                                <input type="text"  name='product_name' value="{{$data['row']->product_name}}"  placeholder="Product Name" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('product_name'))
                                    <span>{{ $errors->first('product_name') }}</span>
                                @endif


                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="quantity"> Quantity </label>

                            <div class="col-sm-9">
                                <input type="text"  name='quantity' value="{{$data['row']->quantity_size}}" placeholder="Quantity" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="price1">Price</label>

                            <div class="col-sm-9">
                                <input type="text" name="price"  value="{{$data['row']->price}}" placeholder="Price" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="delivered_date">Delivered Date</label>

                            <div class="col-sm-9">
                                <input type="date" name="delivered_date" value="{{$data['row']->delivered_date}}"    class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="supplier">Supplier</label>
                            <div class="col-sm-9">
                                <select name="supplier" class="col-xs-10 col-sm-5" />
                                @if(isset($data['supplier']))
                                    @foreach($data['supplier'] as $supplier )
                                        <option value="{{$supplier->id}}" {{$data['row']->supplier == $supplier->id?'selected':''}}>{{$supplier->company_name}}</option>
                                    @endforeach
                                @else
                                    <option value="">No Categories Defined</option>
                                    @endif
                                    </select>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="delivered_date">Invoice Number</label>

                            <div class="col-sm-9">
                                <input type="text" name="invoice_no" value="{{$data['row']->invoice_no}}"  placeholder="Invoice Number" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="image">Existing Image</label>

                            <div class="col-sm-9">
                                @if($data['row']->image)
                                    <img src="{{asset('image/supplies/'.$data['row']->image)}}" height="100px" width="100px">
                                @else
                                    <p>No image were uploaded</p>
                                @endif
                                <input type="file" name="image"  class="col-xs-10 col-sm-5" />
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="status">Status</label>

                            <div class="col-sm-9">
                                <select name="status" class="col-xs-10 col-sm-5" />
                                <option value="1" >In stock</option>
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

                            </div>
                        </div>









                    </form>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->




    </div><!-- /#ace-settings-container -->


@endsection

