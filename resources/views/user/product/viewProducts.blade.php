@extends('user.includes.userlayout')

@section('content')

    <section class="site-section pt-5">
        <div class="container">
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-9 social">

                        </div>
                        <div class="col-3 search-top">

                            <form action="{{route('user.product.view')}}" class="search-top-form">
                                <table>
                                    <tr>
                                        <td>
                                            <input type="text" value="{{ request()->get('product_name') }}"   name="product_name" placeholder="Product name">
                                        </td>

                                <td>
                                <input type="date" value="{{ request()->get('mfd_date') }}" name="mfd_date" >
                                </td>
                                        <td><button type="submit"><i class="icon fa fa-search"></i></button></td>
                                    </tr>
                                </table>
                            </form>
                        </div>
                    </div>
                </div>
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
                    <tr>
                        <td colspan="12"><p>No Product found.</p></td>
                    </tr>

                @endif
            </div>
        </div>
    </section>

@endsection