@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Payment Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
            'data' =>[
            'panel'=> 'Payment Management',
            'panel_url'=>route('admin.payment.received'),
            'current_panel' =>'Payment Received'
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

            <form class="form-horizontal" role="form" method="POST" action="{{route('admin.paymentReceived.store')}}"
                  enctype="multipart/form-data">
                @csrf


                <div class="form-group row">
                    <label class="col-sm-3 control-label no-padding-right" >Received Date</label>

                    <div class="col-sm-9">
                        <input type="date" name="received_date" id="exp_date"  class="col-xs-10 col-sm-5" />

                        @if ($errors->has('received_date'))
                            <span>{{ $errors->first('received_date') }}</span>
                        @endif

                    </div>
                </div>





                <div class="form-group row">
                    <label class="col-sm-3 control-label no-padding-right" >Receipt No</label>

                    <div class="col-sm-9">
                        <input type="text" name="receipt_no"  placeholder="Receipt No" class="col-xs-10 col-sm-5" />

                        @if ($errors->has('receipt_no'))
                            <span>{{ $errors->first('receipt_no') }}</span>
                        @endif

                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-sm-3 control-label no-padding-right" >Amount</label>

                    <div class="col-sm-9">
                        <input type="text"  name="received_amount"  placeholder="Amount" class="col-xs-10 col-sm-5" />

                        @if ($errors->has('received_amount'))
                            <span>{{ $errors->first('received_amount') }}</span>
                        @endif

                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-3 control-label no-padding-right" >Paid By</label>

                    <div class="col-sm-9">
                        <select name="customer_name" class="col-xs-10 col-sm-5">
                        @if(isset($data['received']))
                            @foreach($data['received'] as $received )
                                <option value="{{$received->id}}" >{{$received->name}}</option>
                            @endforeach
                        @else
                            <option value=""> No Customers </option>
                        @endif
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




                    <div class="table-responsive">
                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Received Date</th>
                                <th>Receipt No</th>
                                <th>Amount</th>
                                <th>Paid By</th>
                            </tr>
                            <tr>
                                <form action="{{ route('admin.payment.received') }}" method="GET">

                                    <th><input type="date" value="{{ request()->get('received_date') }}" name="received_date" class="form-control" ></th>
                                    <th><input type="text" value="{{ request()->get('receipt_no') }}" name="receipt_no" class="form-control"></th>
                                    <th></th>
                                    <th><input type="text" value="{{ request()->get('customer_name') }}" name="customer_name" class="form-control"></th>


                                    <th>
                                        <button type="submit" class="btn btn-xs btn-success">
                                            <i class="icon-filter bigger-120"></i>
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



                                        <td>{{$row->received_date}}</td>
                                        <td>{{$row->receipt_no}}</td>
                                        <td >{{$row->received_amount}}</td>
                                        <td>{{$row->name}}</td>

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
            </div>


        </div>




    </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div><!-- /.main-content -->
@endsection