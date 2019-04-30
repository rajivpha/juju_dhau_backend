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
            'panel_url'=>route('admin.userManagement.dealerRequests'),
            'current_panel' =>'View Requests'
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



                    <form class="form-horizontal" role="form" action="{{ route('admin.userManagement.dealerRequests')}}" method="GET">
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

                                <th>Image</th>
                                <th>Name</th>
                                <th>Address</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>

                            </thead>

                            <tbody>


                            @if(isset($data['rows'])&& $data['rows']->count()>0)
                                @foreach($data['rows'] as $row)
                                    <tr>


                                     <td>  <img src="{{asset('images/'.$row->image)}}" height="100px" width="100px"></td>
                                        <td>{{$row->name}}</td>
                                        <td> {{$row->address}}</td>
                                        <td >{{$row->email}}</td>



                                        <td class="hidden-480">
                                            @if ($row->approval == 1)
                                                <span class="label label-sm label-success">Approved</span>
                                            @else
                                                <span class="label label-sm label-warning">Not Approved</span>
                                            @endif
                                        </td>


                                        <td>

                                            <form  action="{{route('admin.userManagement.approve',$row->id)}}" method="POST">
                                                @csrf

<div>
                                                <select type="hidden" name="approval" class="col-xs-10 col-sm-5" />
                                                <option value="1" >Approve</option>
                                                <option value="0" >Do Not Approve</option>
                                                </select>
</div>
                                                <div>
                                                <button class="btn btn-info"  Approvetype="submit">
                                                    <i class="icon-ok bigger-110"></i>
Submit
                                                </button>
                                                </div>
                                            </form>



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
        </div><!-- /row -->




    </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div><!-- /.main-content -->
@endsection