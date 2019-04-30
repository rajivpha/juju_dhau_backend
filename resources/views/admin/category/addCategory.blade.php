@extends('admin.includes.layout')

@section('content')


        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Category Manager</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            @include('admin.includes.breadcrumb',[
           'data' =>[
           'panel'=> 'Category',
           'panel_url'=>route('admin.category.add'),
           'current_panel' =>'Add Categories'
           ]
           ])

                        </ol>
                    </div>
                </div>
            </div>
        </div>



        <div class="content mt-3">



@include('admin.includes.errormsg')

                <form class="form-horizontal" role="form" method="POST" action="{{route('admin.category.store')}}" enctype="multipart/form-data">
                   @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 control-label no-padding-right" for="category_name"> Category Name </label>

                        <div class="col-sm-9">
                            <input type="text"  name='category_name'  placeholder="Category Name" class="col-xs-10 col-sm-5" />

                            @if ($errors->has('category_name'))
                                <span>{{ $errors->first('category_name') }}</span>
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
                        <label class="col-sm-3 control-label no-padding-right" for="status">Status</label>

                        <div class="col-sm-9">
                            <select name="status" class="col-xs-10 col-sm-5" />
                                <option value="1" >Available</option>
                                <option value="0" >Available</option>

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




            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.page-content -->
    </div><!-- /.main-content -->




    </div><!-- /#ace-settings-container -->


    @endsection

