@extends('user.includes.userlayout')

@section('content')

    <section class="site-section pt-5">
        <div class="container">
            <div class="row">
                @if (isset($data['rows']) && $data['rows']->count() > 0)
                    @foreach($data['rows'] as $products)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('user.product.singleview',$products->id)}}" class="a-block d-flex align-items-center height-md" style="background-image: url({{ asset('image/products/'.$products->image) }}); ">
                                <div class="text">
                                    <div class="post-meta">
                                        <span class="category">{{$products->product_name}}</span><br>
                                        <span class="p-1 mb-2 bg-success text-white">
                                            @if ($products->status == 1)
                                                <span>In Stock</span>
                                            @else
                                                <span>Out of Stock</span>
                                            @endif<br></span>
                                    </div>
                                    <p>
                                        <b>Manufactured Date:</b>
                                        <br>
                                        {{$products->mfd_date}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <h3>No Product of this category has been added.</h3>
                @endif
            </div>
        </div>
    </section>


@endsection