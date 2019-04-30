@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Order Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
                   'data' =>[
                   'panel'=> 'Order',
                   'panel_url'=>route('admin.order.approved'),
                   'current_panel' =>'Approved Orders'
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



                    <form class="form-horizontal" role="form" action="{{ route('admin.order.approved')}}" method="GET">
                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" >Product Name </label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ request()->get('product_name') }}" name="product_name"  placeholder="Product Name" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" >Ordered By </label>

                            <div class="col-sm-9">
                                <input type="text" value="{{ request()->get('user_name') }}" name="user_name"  placeholder="Ordered By" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" >Ordered Date</label>

                            <div class="col-sm-9">
                                <input type="date" value="{{ request()->get('order_date') }}" name="order_date"  placeholder="Ordered Date" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>


                        <div class="clearfix form-actions">
                            <div class="col-md-offset-3 col-md-9">
                                <button class="btn btn-success" type="submit">
                                    <i class="icon-filter bigger-120"></i>
                                    Filter
                                </button>


                            </div>
                        </div>
                    </form>


                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>


                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Ordered Date</th>
                                <th>Ordered By</th>
                                <th>Status</th>
                            </tr>
                            </thead>

                            <tbody>


                            @if(isset($data['rows']) && $data['rows']->count()>0)
                                @foreach($data['rows'] as $row)
                                    <tr>



                                        <td >{{$row->product_name}}</td>
                                        <td>{{$row->quantity}}</td>
                                        <td >{{$row->order_date}}</td>
                                        <td >{{$row->user_name}}</td>

                                        <td class="hidden-480">
                                            @if ($row->approval == 1)
                                                <span class="label label-sm label-success">Approved</span>
                                            @else
                                                <span class="label label-sm label-warning">Not Approved</span>
                                            @endif
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
        </div><!-- /row -->

    </div>
    </div>




    </div>


@endsection

