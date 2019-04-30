@extends('admin.includes.layout')

@section('content')

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Product Manager</h1>
                    </div>
                </div>
            </div>
        </div>


        <div class="content mt-3">
            <div class="container">
                <div class="row">
        @if (isset($data['rows']) && $data['rows']->count() > 0)
            @foreach($data['rows'] as $row)

                <div class="col-md-4">
                    <a href="" title="ceremony"><img src="{{ asset('image/products/'.$row->image) }}" height="200px" width="300px" ></a>
                    <h4 class="event-title">
                        <p>
                            Category: <a href=""> {{ $row->category }}</a><br>
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

@endsection

