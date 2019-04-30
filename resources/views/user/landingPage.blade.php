@extends('user.includes.layout')


@section('content')

<section class="site-section pt-5">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="owl-carousel owl-theme home-slider">
                    @if (isset($data['banners']) && $data['banners']->count() > 0)
                        @foreach($data['banners'] as $key => $banner)
                            <div>
                                <a class="a-block d-flex align-items-center height-lg" style="background-image: url('{{ asset('image/banners/'.$banner->image) }}'); ">
                                    <div class="text half-to-full">
                                        <div class="post-meta">
                                            <span class="category">Curd</span>
                                            <span class="mr-2">{{ $banner->created_at}}</span>
                                        </div>
                                        <h3>{{ $banner->caption}}</h3>
                                        <p>{{ $banner->alt_text}}</p>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>



        <div class="row">
            @if (isset($data['categories']) && $data['categories']->count() > 0)
                @foreach($data['categories'] as $categories)
                    <div class="col-md-6 col-lg-4">
                        <a  class="a-block d-flex align-items-center height-md" style="background-image: url({{ asset('image/categories/'.$categories->image) }}); ">
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

    </div>
</section>




@endsection

