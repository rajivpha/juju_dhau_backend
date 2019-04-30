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
                   'panel_url'=>route('admin.supplies.list'),
                   'current_panel' =>'List Supplied Product'
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



                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th>Supplier</th>
                                        <th>Delivered Date</th>
                                        <th>Invoice Number</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    <tr>
                                        <form action="{{ route('admin.supplies.list') }}" method="GET">
                                            <th class="center"></th>
                                            <th><input type="text" value="{{ request()->get('product_name') }}" name="product_name" class="form-control"></th>
                                            <th><input type="text" value="{{ request()->get('quantity_size') }}" name="quantity_size" class="form-control"></th>
                                            <th><input type="text" value="{{ request()->get('price') }}" name="price" class="form-control"></th>
                                            <th></th>
                                            <th><input type="text" value="{{ request()->get('company_name') }}" name="company_name" class="form-control"></th>
                                            <th><input type="date" value="{{ request()->get('delivered_date') }}" name="delivered_date" class="form-control"></th>
                                            <th><input type="text" value="{{ request()->get('invoice_no') }}" name="invoice_no" class="form-control"></th>
                                            <th>

                                                <select name="status" />
                                                <option></option>
                                                <option value="1" >In Stock</option>
                                                <option value="0">Out of Stock</option>
                                            </th>

                                            <th>
                                                <button type="submit" class="btn btn-xs btn-success">
                                                    <i class="fa-filter"></i>
                                                    Filter
                                                </button>
                                            </th>
                                        </form>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @if(isset($data['rows']) && $data['rows']->count()>0)
                                        @foreach($data['rows'] as $row)
                                            <tr>

                                                <?php $price=($row->price);
                                                    $quantity=($row->quantity_size);
                                                    $total=$price*$quantity
                                                ?>

                                                <td><img height="100px" width="100px" src="{{asset('image/supplies/'.$row->image)}}"></td>
                                                <td>{{$row->product_name}}</td>
                                                <td>{{$row->quantity_size}}</td>
                                                <td >{{$row->price}}</td>
                                                <td ><?php echo $total; ?> </td>
                                                <td>{{$row->company_name}}</td>
                                                <td >{{$row->delivered_date}}</td>
                                                <td >{{$row->invoice_no}}</td>



                                                <td class="hidden-480">
                                                    @if ($row->status == 1)
                                                        <span class="label label-sm label-success">In Stock</span>
                                                    @else
                                                        <span class="label label-sm label-warning">Out of Stock</span>
                                                    @endif
                                                </td>


                                                <td>

                                                    <a href="{{route('admin.supplies.edit',$row->id)}}" class="btn btn-xs btn-info">

                                                        <i class="ti-check-box"></i>
                                                    </a>

                                                    <a href="{{route('admin.supplies.deleteSupply', $row->id)}}" class="btn btn-xs btn-danger">
                                                        <i class="ti-trash"></i>
                                                    </a>


                                                </td>
                                            </tr>
                                        @endforeach

                                    @else
                                        <tr>
                                            <td colspan="12"><p>No records found.</p></td>
                                        </tr>
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.table-responsive -->
                    </div><!-- /span -->


                </div>
            </div>
        </div>
    </div>




    </div>


@endsection

