@extends('userBase')

@section('header')
    <!--================ Start Header Menu Area =================-->
    @include('user.ui.navbar')<!--================ End Header Menu Area =================-->
@endsection



@section('content')

    <main class="site-main">

        <!--================ Hero banner start =================-->
        <section class="hero-banner">
            <div class="container">
                <div class="row no-gutters align-items-center pt-60px">
                    <div class="col-5 d-none d-sm-block">
                        <div class="hero-banner__img">
                            <img class="img-fluid" src="{{asset('img/hero-banner.png')}}" alt="">
                        </div>
                    </div>
                    <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
                        <div class="hero-banner__content">
                            <h4>Shop is fun</h4>
                            <h1>Browse Our Premium Product</h1>
                            <p>Us which over of signs divide dominion deep fill bring they're meat beho upon own earth
                                without morning over third. Their male dry. They are great appear whose land fly
                                grass.</p>
                            <a class="button button-hero" href="{{route('shop')}}">Browse Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--================ Hero banner start =================-->

        <!--================ Hero Carousel start =================-->
        <section class="section-margin mt-0">
            <div class="owl-carousel owl-theme hero-carousel">
                @foreach($categories as $category)
                    <div class="hero-carousel__slide">
                        <img src="{{url('uploads/'.$category->image->name)}}" alt="" width="80px" height="350px">
                        <a href="{{route('category',$category->id)}}" class="hero-carousel__slideOverlay">
                            <h3>{{$category->name}}</h3>
                            <p>{{$category->description}}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>
        <!--================ Hero Carousel end =================-->

        <!-- ================ trending product section start ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Popular Item in the market</p>
                    <h2>Trending <span class="section-intro__style">Product</span></h2>
                </div>
                <div class="row">

                    @foreach($products as $product)
                        @if($product->trend === 'is trend')
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="card-img" src="{{url('uploads/'.$product->image->name)}}" alt="">
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button>
                                                    <a href="{{route('show',$product->id)}}"><i
                                                                class="ti-search"></i></a>

                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    <a href="{{route('add-product-cart',$product->id)}}"><i
                                                                class="ti-shopping-cart"></i></a>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$product->category->name}}</p>
                                        <h4 class="card-product__title"><a
                                                    href="single-product.html">{{$product->name}}</a>
                                        </h4>
                                        <p class="card-product__price">${{$product->selling_price}}</p>
                                    </div>
                                </div>
                            </div>


                        @endif
                    @endforeach

                </div>
            </div>
        </section>
        <!-- ================ trending product section end ================= -->


        <!-- ================ offer section start ================= -->

        <!-- ================ offer section end ================= -->

        <!-- ================ Best Selling item  carousel ================= -->
        <section class="section-margin calc-60px">
            <div class="container">
                <div class="section-intro pb-60px">
                    <p>Popular Item in the market</p>
                    <h2>Best <span class="section-intro__style">Sellers</span></h2>
                </div>
                <div class="owl-carousel owl-theme" id="bestSellerCarousel">
                        @foreach($products as $product)
                            @if($product->best_seller === 'best seller')
                                <div class="card text-center card-product">
                                    <div class="card-product__img">
                                        <img class="img-fluid" src="{{url('uploads/'.$product->image->name)}}" alt="">
                                        <ul class="card-product__imgOverlay">
                                            <li>
                                                <button>
                                                    <a href="{{route('show',$product->id)}}"><i
                                                                class="ti-search"></i></a>

                                                </button>
                                            </li>
                                            <li>
                                                <button>
                                                    <a href="{{route('add-product-cart',$product->id)}}"><i
                                                                class="ti-shopping-cart"></i></a>
                                                </button>
                                            </li>

                                        </ul>
                                    </div>
                                    <div class="card-body">
                                        <p>{{$product->category->name}}</p>
                                        <h4 class="card-product__title"><a
                                                    href="single-product.html">{{$product->name}}</a>
                                        </h4>
                                        <p class="card-product__price">${{$product->selling_price}}</p>
                                    </div>
                                </div>

                        @endif
                        @endforeach

                </div>
            </div>
        </section>
        <!-- ================ Best Selling item  carousel end ================= -->

        <!-- ================ Blog section start ================= -->

        <!-- ================ Blog section end ================= -->

    </main>

    <div style="margin-top: 50px; "></div>

@endsection


@section('footer')

    @include('user.ui.footer')

@endsection
