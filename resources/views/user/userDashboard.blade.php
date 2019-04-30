@extends('user.includes.userlayout')

@section('content')
    <section class="site-section pt-5">
        <div class="container">

            <div class="card">
                <div class="card-header">
                    Categories
                </div>
            </div>


            <div class="row">
                @if (isset($data['categories']) && $data['categories']->count() > 0)
                    @foreach($data['categories'] as $categories)
                        <div class="col-md-6 col-lg-4">
                            <a href="{{route('user.category.product',$categories->id)}}" class="a-block d-flex align-items-center height-md" style="background-image: url({{ asset('image/categories/'.$categories->image) }}); ">
                                <div class="text">
                                    <div class="post-meta">
                                        <span class="category">Category</span>
                                    </div>
                                    <h3> {{ $categories->category_name}} </h3>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif
            </div>


            <div class="card">
                <div class="card-header">
                    Products
                </div>
            </div>

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
                                            @endif
                                                <br>
                                        </span>
                                    </div>
                                    <p>
                                        <b>Manufactured Date:</b><br>
                                        {{$products->mfd_date}}
                                    </p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @endif

                    <div class="col-md-6 col-lg-4">
                        <a href="{{route('user.product.view')}}" class="a-block d-flex align-items-center height-md" style="background-image: url('{{asset('assets/test/images/img.jpg')}}'); ">
                            <div class="text">
                                <div class="post-meta">
                                    <span class="p-4 bg-success text-white">View More</span>
                                </div>
                            </div>
                        </a>
                    </div>

            </div>
        </div>
    </section>


@endsection



