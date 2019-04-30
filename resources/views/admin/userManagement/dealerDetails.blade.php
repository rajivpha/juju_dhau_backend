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
                  'current_panel' =>'Dealer Detail'
                  ]
                  ])

                        </ol>
                    </div>
                </div>
            </div>
        </div>




        <div class="content mt-3">

                    <div class=".col-md-3 .offset-md-3">
                        <div class="well well-lg">
                            <h4 class="blue">{{$data['row']->name}}</h4>

                            <b>First Name:</b>   {{$data['row']->first_name}}<br>
                                    <b> Middle Name:</b>   {{$data['row']->middle_name}}<br>
                                        <b>Last Name:</b>    {{$data['row']->last_name}}<br>
                                            <b>Address:</b>    {{$data['row']->address}}<br>
                                                <b>Contact No:</b>    {{$data['row']->contact_no}}<br>
                                                <b> Email:</b>    {{$data['row']->email}}<br>
                                                    <b>Dealership Applied on:</b>   {{$data['row']->created_at}}<br>
                                                        <b>Approved:</b>  {{$data['row']->updated_at}}<br>

                            <img height="300px" width="300px" src="{{asset('images/'.$data['row']->image)}}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





@endsection