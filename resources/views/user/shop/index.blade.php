@extends('userBase')


<!--================ Start Header Menu Area =================-->
@section('header')
    @include('user.ui.navbar')
@endsection

<!--================ End Header Menu Area =================-->
@section('content')
    <!-- ================ start banner area ================= -->
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner my-5">
                <div class="text-center">
                    <h1>Our Shop</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <h3>Where You Can Find Everything</h3>
                        {{--                    <ol class="breadcrumb">--}}
                        {{--                        <li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                        {{--                        <li class="breadcrumb-item active" aria-current="page">Shop </li>--}}
                        {{--                    </ol>--}}
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!-- ================ category section start ================= -->
    <section class="section-margin--small mb-5">
        <div class="container">
            <div class="row">
                @include('user.ui.sidebar')
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <!-- Start Filter Bar -->
                    <div class="filter-bar d-flex flex-wrap align-items-center">

                        <div>
{{--                            <form action="" method="GET">--}}
{{--                                @csrf--}}
                                <div class="input-group filter-bar-search">

                                    <input id="search" type="text" name="search" placeholder="Search">
                                    <div class="input-group-append">
                                        <button type="submit"><i class="ti-search"></i></button>
                                    </div>
                                </div>
{{--                            </form>--}}
                        </div>
                    </div>
                    <!-- End Filter Bar -->
                    <!-- Start Best Seller -->

                        <section class="lattest-product-area pb-40 category-list" id="paginate">
                            <div class="row" id="searchContainer">
                                @foreach($products as $product)
                                    <div class="col-md-6 col-lg-4">
                                        <div class="card text-center card-product">
                                            <div class="card-product__img">
                                                <img class="card-img" src="{{url('uploads/'.$product->image->name)}}"
                                                     alt="">
                                                <ul class="card-product__imgOverlay">
                                                    <li>
                                                        <a href="{{route('show',$product->id)}}">
                                                            <button><i class="ti-search"></i></button>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <button>
                                                            <a href="{{route('add-product-cart',$product->id)}}"><i class="ti-shopping-cart"></i></a>
                                                        </button>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="card-body">
                                                <p>{{$product->category->name}}</p>
                                                <h4 class="card-product__title"><a
                                                        href="{{route('show',$product->id)}}">{{$product->name}}</a>
                                                </h4>
                                                <p class="card-product__price">{{$product->selling_price}}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                    {{$products->links()}}

                            </div>
                        </section>



                <!-- End Best Seller -->
                </div>
            </div>
        </div>
    </section>
    <!-- ================ category section end ================= -->
    <div style="margin-top: 100px; "></div>


@endsection

<!--================ Start footer Area  =================-->
@section('footer')
    @include('user.ui.footer')
@endsection


@section('js')
    <script>
        $("#search").on('keyup',function(e){
            e.preventDefault();
            var searchInput = $(this).val().trim();

            $.ajax({

                method: 'GET',
                url: '{{route('search')}}',
                dataType: 'json',
                data: {searchInput: searchInput, '_token': '{{csrf_token()}}'},
                success: function (data) {

                    var output = '';
                        data.map(el=>{
                            output += '\n' +
                                '                 <div class="col-md-6 col-lg-4">\n' +
                                '                                    <div class="card text-center card-product">\n' +
                                '                                        <div class="card-product__img">\n' +
                                '                                            <img class="card-img" src="/storage/'+el['image']['name']+'" alt="">\n' +
                                '                                            <ul class="card-product__imgOverlay">\n' +
                                '                                                <li>\n' +
                                '                                                    <a href="/shop/product/'+el['id']+'">\n' +
                                '                                                        <button><i class="ti-search"></i></button>\n' +
                                '                                                    </a>\n' +
                                '                                                </li>\n' +
                                '                                                <li>\n' +
                                '                                                    <button>\n' +
                                '                                                        <a href="/add-product-cart/'+el['id']+'"><i class="ti-shopping-cart"></i></a>\n' +
                                '                                                    </button>\n' +
                                '                                                </li>\n' +
                                '                                            </ul>\n' +
                                '                                        </div>\n' +
                                '                                        <div class="card-body">\n' +
                                '                                            <p>'+el['name']+'</p>\n' +
                                '                                            <h4 class="card-product__title"><a\n' +
                                '                                                        href="/shop/product/'+el['id']+'">'+el['name']+'</a>\n' +
                                '                                            </h4>\n' +
                                '                                            <p class="card-product__price">'+el['selling_price']+'</p>\n' +
                                '                                        </div>\n' +
                                '                                    </div>\n' +
                                '                                </div>\n' +
                                '\n' +
                                '\n' +
                                '                '
                        })
                        if(output){
                            $('#searchContainer').html(output);
                        }else{
                            $('#searchContainer').html('<strong class="text-center">No Result Found for '+searchInput+'</strong>');
                        }


                    }


            })


        });


    </script>
            <script>
            $(document).ready(function () {
                $(document).on('click','.pagination a',function(e){
                    e.preventDefault();

                    var page = $(this).attr('href').split("page=")[1];

                    paginate(page);

                });

                function paginate(page){

                    var row = $('#searchContainer');
                    row.html('');
                    $.ajax({

                        url: '/paginate?page='+ page,
                        data:{page:page},
                        success:function(data) {

                            row.html(data);
                            location.hash = page;




                        }

                    })


                }

            });

        </script>

@endsection
