@extends('user.includes.userlayout')

@section('content')
    <section class="site-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h1>Your past Orders</h1>
                            <div class="card-body">
                                <a href="{{route('user.order.placeorder')}}"> Place an order </a><br><br>

                                <div class="table-responsive">
                                    <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                        <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Quantity</th>
                                            <th>Ordered Date</th>
                                            <th>Ordered For</th>
                                            <th>Ordered By</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>

                                        <tbody>
                                        @if(isset($data['rows']) && $data['rows']->count()>0)
                                            @foreach($data['rows'] as $row)
                                                <tr>

                                                    <td><b>{{$row->product_name}} </b></td>
                                                    <td><b>{{$row->quantity}}</b></td>
                                                    <td><b>{{$row->created_at}}</b></td>
                                                    <td><b>{{$row->order_date}}</b></td>
                                                    <td><b>{{$row->user_name}}</b></td>
                                                    <td class="hidden-480">
                                                        @if ($row->approval == 1)
                                                            <span class="p-3 mb-2 bg-success text-light"><b>Approved</b></span>
                                                        @else
                                                            <span class="label label-sm label-warning"><b>Not Approved</b></span>
                                                    @endif
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