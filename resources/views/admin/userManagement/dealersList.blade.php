@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
            'data' =>[
            'panel'=> 'User Management',
            'panel_url'=>route('admin.userManagement.view'),
            'current_panel' =>'Dealer List'
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

                          <form class="form-horizontal" role="form" action="{{ route('admin.userManagement.view')}}" method="GET">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label no-padding-right" >Name </label>

                                    <div class="col-sm-9">
                                        <input type="text" value="{{ request()->get('name') }}" name="name"  placeholder="Name" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 control-label no-padding-right" >E-mail</label>

                                    <div class="col-sm-9">
                                        <input type="text" value="{{ request()->get('email') }}" name="email"  placeholder="Email" class="col-xs-10 col-sm-5" />
                                    </div>
                                </div>


                                <div class="clearfix form-actions">
                                    <div class="col-md-offset-3 col-md-9">
                                        <button class="btn btn-success" type="submit">
                                            <i class="fa-filter"></i>
                                            Filter
                                        </button>


                                    </div>
                                </div>
                            </form>



                        <table id="sample-table-1" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>

                                <th>Image</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Details</th>

                            </tr>
                            </thead>

                            <tbody>


                            @if(isset($data['rows']) && $data['rows']->count()>0)
                                @foreach($data['rows'] as $row)
                                    <tr>


                                        <td><img height="100px" width="100px" src="{{asset('images/'.$row->image)}}"></td>
                                        <td >{{$row->name}}</td>
                                        <td>{{$row->address}}</td>
                                        <td >{{$row->email}}</td>

                                        <td class="hidden-480">
                                            @if ($row->approval == 1)
                                                <span class="label label-sm label-success">Approved</span>
                                            @else
                                                <span class="label label-sm label-warning">Not Approved</span>
                                            @endif
                                        </td>


                                        <td>

                                            <a href="{{route('admin.userManagement.dealerview',$row->id)}}" class="btn btn-xs btn-success">

                                                <i class="ti-eye"></i>
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
        </div><!-- /row -->



    </div>




    </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div><!-- /.main-content -->
@endsection