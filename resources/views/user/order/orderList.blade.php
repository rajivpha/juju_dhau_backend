@extends('user.includes.userlayout')

@section('content')
    <section class="site-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Order List</h1>
                            <div class="card-body">
    <a href="{{route('user.order.placeorder')}}"> Place an order </a>
<br>
    <br>

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
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Ordered For</th>
                <th>Ordered By</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @if(isset($data['rows']) && $data['rows']->count()>0)
                @foreach($data['rows'] as $row)
                    <tr>
                        <td ><b>{{$row->product_name}}</b></td>
                        <td><b>{{$row->quantity}}</b></td>
                        <td ><b>{{$row->order_date}}</b></td>
                        <td ><b>{{$row->user_name}}</b></td>

                        <td class="hidden-480">
                            @if ($row->approval == 1)
                                <span class="p-3 mb-2 bg-success text-light">Approved</span>
                            @else
                                <span class="p-3 mb-2 bg-warning text-dark"><b>Not Approved Yet</b></span>
                            @endif
                        </td>

                        <td>
                            <a href="{{route('user.order.editorder',$row->id)}}" class="btn btn-xs btn-info">

                                <i class="icon-edit bigger-120"></i>
                                Edit
                            </a>

                            <a href="{{route('user.order.cancelorder', $row->id)}}" class="btn btn-xs btn-danger">
                                <i class="icon-trash bigger-120"></i>
                                Delete
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection