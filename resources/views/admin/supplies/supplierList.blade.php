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
                   'panel_url'=>route('admin.supplies.supply'),
                   'current_panel' =>'Supplier List'
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
                        </div>.
                    @endif

                        @include('admin.includes.errormsg')
                      

                    <form class="form-horizontal" role="form" method="POST" action="{{route('admin.supplies.storeSupplier')}}"
                          enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="first_name"> First Name </label>

                            <div class="col-sm-9">
                                <input type="text"  name='first_name' placeholder="First Name" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('first_name'))
                                    <span>{{ $errors->first('first_name') }}</span>
                                @endif

                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="middle_name">Middle Name</label>

                            <div class="col-sm-9">
                                <input type="text" name="middle_name"  placeholder="Middle Name" class="col-xs-10 col-sm-5" />
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="last_name">Last Name</label>

                            <div class="col-sm-9">
                                <input type="text"  name="last_name"  placeholder="Last Name" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('last_name'))
                                    <span>{{ $errors->first('last_name') }}</span>
                                @endif

                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="company_name">Company Name</label>

                            <div class="col-sm-9">
                                <input type="text"  name="company_name"  placeholder="Company Name" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('company_name'))
                                    <span>{{ $errors->first('company_name') }}</span>
                                @endif

                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="address">Address</label>

                            <div class="col-sm-9">
                                <input type="text"  name="address"  placeholder="Address" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('address'))
                                    <span>{{ $errors->first('address') }}</span>
                                @endif

                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="contact_no">Contact Number</label>

                            <div class="col-sm-9">
                                <input type="text"  name="contact_no"  placeholder="Contact Number" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('contact_no'))
                                    <span>{{ $errors->first('contact_no') }}</span>
                                @endif

                            </div>
                        </div>





                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="email">E-mail</label>

                            <div class="col-sm-9">
                                <input type="text"  name="email"  placeholder="E-mail" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('email'))
                                    <span>{{ $errors->first('email') }}</span>
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
                            <label class="col-sm-3 control-label no-padding-right" for="goods_supplied">Goods Supplied</label>

                            <div class="col-sm-9">
                                <input type="text"  name="goods_supplied"  placeholder="Goods Supplied" class="col-xs-10 col-sm-5" />

                                @if ($errors->has('goods_supplied'))
                                    <span>{{ $errors->first('goods_supplied') }}</span>
                                @endif

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


                    <div>

                            <div class="table-responsive">
                                <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>

                                        <th>Image</th>
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Company Name</th>
                                        <th>Address</th>
                                        <th>Contact No.</th>
                                        <th> E-mail</th>
                                        <th>Goods Supplied</th>
                                        <th class="hidden-480">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @if(isset($data['rows']) && $data['rows']->count()>0)
                                        @foreach($data['rows'] as $row)
                                            <tr>


                                                <td><img height="100px" width="100px" src="{{asset('image/supplier/'.$row->image)}}"></td>
                                                <td>{{$row->first_name}}</td>
                                                <td>{{$row->middle_name}}</td>
                                                <td >{{$row->last_name}}</td>
                                                <td >{{$row->company_name}}</td>
                                                <td>{{$row->address}}</td>
                                                <td >{{$row->contact_no}}</td>
                                                <td >{{$row->email}}</td>
                                                <td >{{$row->goods_supplied}}</td>

                                                <td>


                                                    <a href="{{route('admin.supplies.deleteSupplier', $row->id)}}" class="btn btn-xs btn-danger">
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
                    </div>

                </div>
            </div>
        </div>
    </div>




    </div>


@endsection

