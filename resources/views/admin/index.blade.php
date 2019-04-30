@extends('admin.includes.layout')



@section('content')




                    <div class="breadcrumbs">
                        <div class="col-sm-4">
                            <div class="page-header float-left">
                                <div class="page-title">
                                    <h1>Dashboard</h1>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="page-header float-right">
                                <div class="page-title">
                                    <ol class="breadcrumb text-right">
                                        <li class="active">Dashboard</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>


    <div class="content mt-3">
                    <h1>Categories</h1>

                            <div class="row-fluid">

                            <div class="row">
                                @if (isset($data['categories']) && $data['categories']->count() > 0)
                                    @foreach($data['categories'] as $categories)
                                <div class="col-md-4">
                                    <a  href="{{route('admin.category.product',$categories->id)}}"
                                       title="ceremony"><img src="{{ asset('image/categories/'.$categories->image) }}"
                                                             height="200px" width="300px"></a>
                                    <h4 class="event-title">
                                        <a href="{{route('admin.category.product',$categories->id)}}" >
                                            {{ $categories->category_name }}</a>
                                    </h4>
                                </div>
                                    @endforeach
                                    @endif
                            </div>

                                <h1>Products</h1>

                        <div class="row">
                            @if (isset($data['rows']) && $data['rows']->count() > 0)
                                @foreach($data['rows'] as $row)
                                    <div class="col-md-4">
                                        <a href="" title="ceremony"><img src="{{ asset('image/products/'.$row->image) }}"
                                                                         height="200px" width="300px" ></a>
                                        <h4 class="event-title">
                                            <p>
                                                Product: <a href=""> {{ $row->product_name }}</a><br>
                                                Price: <a href="" >{{ $row->price }} </a><br>
                                                Date: <a href="" >{{ $row->mfd_date }}</a>
                                            </p>
                                        </h4>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
    </div>
                </div>
    </div>
















@endsection


