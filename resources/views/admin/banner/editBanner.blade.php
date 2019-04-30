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
                   'current_panel' =>'Update Banners'
                   ]
                   ])
                        </ol>
                    </div>
                </div>
            </div>
        </div>





        <div class="content mt-3">

                    @include('admin.includes.errormsg')




                    <form class="form-horizontal" role="form" method="POST"
                          action="{{route('admin.banners.update',$data['row']->id)}}" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group row">
                            <label class="col-sm-3 control-label no-padding-right" for="image">Existing Image</label>

                            <div class="col-sm-9">


                                <input type="file" name="image"  class="col-xs-10 col-sm-5" />

                                @if($data['row']->image)
                                    <img src="{{asset('image/banners/'.$data['row']->image)}}" height="100px" width="100px">
                                @else
                                    <p>No image were uploaded</p>
                                @endif

                            </div>
                        </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label no-padding-right" for="alt_text"> Alternate Text </label>

                                <div class="col-sm-9">
                                    <input type="text"  name='alt_text' placeholder="Description" value="{{$data['row']->alt_text}}" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-grou row">
                                <label class="col-sm-3 control-label no-padding-right" for="caption">Caption</label>

                                <div class="col-sm-9">
                                    <input type="text" name="caption"  placeholder="Caption" value="{{$data['row']->caption}}" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label no-padding-right" for="rank">Rank</label>

                                <div class="col-sm-9">
                                    <input type="number" min="1" name="rank"  placeholder="Rank" value="{{$data['row']->rank}}" class="col-xs-10 col-sm-5" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-sm-3 control-label no-padding-right" for="status">Status</label>

                                <div class="col-sm-9">
                                    <select name="status" class="col-xs-10 col-sm-5" />
                                    <option value="1" {{$data['row']->status?'selected':''}}>Active</option>
                                    <option value="0" {{!$data['row']->status?'selected':''}}>In active</option>

                                    </select>


                                </div>
                            </div>



                            <div class="clearfix form-actions">
                                <div class="col-md-offset-3 col-md-9">
                                    <button class="btn btn-info" type="submit">
                                        <i class="icon-ok bigger-110"></i>
                                        Update
                                    </button>

                                    <button class="btn" type="reset">
                                        <i class="icon-undo bigger-110"></i>
                                        Reset
                                    </button>
                                </div>
                            </div>

                    </form>

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.page-content -->
    </div><!-- /.main-content -->




    </div><!-- /#ace-settings-container -->


@endsection

