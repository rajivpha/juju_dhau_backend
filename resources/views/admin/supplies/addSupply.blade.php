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
                   'panel'=> 'Supply',
                   'panel_url'=>route('admin.supplies.addSupply'),
                   'current_panel' =>'Add Supply'
                   ]
                   ])
                        </ol>
                    </div>
                </div>
            </div>
        </div>




        <div class="content mt-3">

                    @if(session()->has('success_message'))
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert">
                                <i class="icon-remove"></i>
                            </button>
                            {{session()->get('success_message')}}
                        </div>
                    @endif

                        @include('admin.includes.errormsg')
                        <form class="form-horizontal" role="form" method="POST" action="{{route('admin.supplies.store')}}" enctype="multipart/form-data">
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
                            <label class="col-sm-3 control-label no-padding-right" for="delivered_date">Delivered Date</label>

                            <div class="col-sm-9">
                                <input type="date" name="delivered_date"    class="col-xs-10 col-sm-5" />

                                @if ($errors->has('delivered_date'))
                                    <span>{{ $errors->first('delivered_date') }}</span>
                                @endif

                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="delivered_date">Supplier</label>
                            <div class="col-sm-9">
                                <select name="supplier" class="col-xs-10 col-sm-5" />
                                @if(isset($data['supplier']))
                                    @foreach($data['supplier'] as $supplier )
                                        <option value="{{$supplier->id}}" >{{$supplier->company_name}}</option>
                                    @endforeach
                                @else
                                    <option value="">No Supplier Added</option>
                                    @endif
                                    </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="delivered_date">Invoice Number</label>

                            <div class="col-sm-9">
                                <input type="text" name="invoice_no"   placeholder="Invoice Number" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('invoice_no'))
                                    <span>{{ $errors->first('invoice_no') }}</span>
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


                </div>
            </div>
        </div>
    </div>




    </div>


@endsection

