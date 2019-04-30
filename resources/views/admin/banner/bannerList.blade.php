@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Banner Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
            'data' =>[
            'panel'=> 'Banner',
            'panel_url'=>route('admin.banners.view'),
            'current_panel' =>'Banner List'
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
                                        <th>Alt Text</th>
                                        <th>Caption</th>
                                        <th>Rank</th>
                                        <th class="hidden-480">Image</th>
                                        <th class="hidden-480">Status</th>
                                        <th class="hidden-480">Action</th>
                                    </tr>
                                    </thead>

                                    <tbody>


                                    @if(isset($data['rows']) && $data['rows']->count()>0)
                                        @foreach($data['rows'] as $row)
                                    <tr>


                                        <td><img height="100px" width="100px" src="{{asset('image/banners/'.$row->image)}}"></td>
                                        <td >{{$row->alt_text}}</td>
                                        <td>{{$row->caption}}</td>
                                        <td >{{$row->rank}}</td>
                                        <td>{{$row->image}}</td>

                                        <td class="hidden-480">
                                            @if ($row->status == 1)
                                                <span class="label label-sm label-success">Active</span>
                                            @else
                                                <span class="label label-sm label-warning">In active</span>
                                            @endif
                                        </td>


                                        <td>

                                                <a href="{{route('admin.banners.edit',$row->id)}}" class="btn btn-xs btn-info">

                                                        <i class="ti-check-box"></i>
                                                </a>

                                               <a href="{{route('admin.banners.delete', $row->id)}}" class="btn btn-xs btn-danger">
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
                    </div><!-- /row -->




                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->
@endsection