@extends('user.includes.userlayout')

@section('content')
    <section class="site-section pt-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h1>Edit your Order</h1>
                            <div class="card-body">
                                @if(session()->has('success_message'))
                                    <div class="alert alert-success">
                                        <button type="button" class="close" data-dismiss="alert">
                                            <i class="icon-remove"></i>
                                        </button>
                                        {{session()->get('success_message')}}
                                    </div>
                                @endif
                                    @include('admin.includes.errormsg')

                                    <form class="form-horizontal" role="form" method="POST" action="{{route('user.order.update',$data['row']->id)}}" enctype="multipart/form-data">
                                        @csrf

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-md-right" for="product_name"> Product Name </label>
                                            <div class="col-sm-8">
                                                <input type="text"  name='product_name'  placeholder="Product Name" value="{{$data['row']->product_name}}" class="col-xs-10 col-sm-8" />

                                                @if ($errors->has('product_name'))
                                                    <span>{{ $errors->first('product_name') }}</span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-md-right" for="quantity_size"> Quantity</label>
                                            <div class="col-sm-8">
                                                <input type="text"  name="quantity_size" value="{{$data['row']->quantity}}" placeholder="Quantity" class="col-xs-10 col-sm-8" />

                                                @if ($errors->has('quantity_size'))
                                                    <span>{{ $errors->first('quantity_size') }}</span>
                                                @endif

                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <label class="col-sm-4 col-form-label text-md-right" for="order_date"> Order Date </label>
                                            <div class="col-sm-8">
                                                <input type="date"  name="order_date" value="{{$data['row']->order_date}}" placeholder=" Order Date " class="col-xs-10 col-sm-8" />

                                                @if ($errors->has('order_date'))
                                                    <span>{{ $errors->first('order_date') }}</span>
                                                @endif

                                            </div>
                                        </div>



                                        <div class="form-group row mb-0">
                                            <div class="col-md-8 offset-md-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Confirm
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection