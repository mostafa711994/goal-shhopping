@extends('userBase')



@section('header')
    @include('user.ui.navbar')
@endsection

<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
@section('content')
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner my-5">
                <div class="text-center">
                    <h1>Our Shop</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <h3>Where You Can Find Everything</h3>

                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->


    <!--================Single Product Area =================-->
    <div class="product_image_area">
        <div class="container">
            <div class="row s_product_inner">
                <div class="col-lg-6">
                    <div class="owl-carousel owl-theme s_Product_carousel">
                        <div class="single-prd-item">
                            <img class="img-fluid" src="{{url('uploads/'.$product->image->name)}}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-1">
                    <div class="s_product_text">
                        <h3>{{$product->name}}</h3>
                        <h2>${{$product->selling_price}}</h2>
                        <ul class="list">
                            <li><a class="active"
                                   href="{{route('category',$product->category->id)}}"><span>Category:</span>{{$product->category->name}}
                                </a></li>
                            <li><a href="#"><span>Availibility:</span>{{$product->is_available}}</a></li>
                        </ul>
                        <p>{{$product->description}}.</p>
                        <div class="product_count">
                            <form action="{{route('add-cart')}}" method="POST">
                                @csrf
                                <label for="qty">Quantity:</label>
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
                                        class="increase items-count" type="button"><i class="ti-angle-up"></i></button>
                                <input type="text" name="qty" id="sst" size="2" maxlength="12" value="1"
                                       title="Quantity:"
                                       class="input-text qty">
                                <input type="hidden" name="product_id" value="{{$product->id}}">
                                <button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                        class="reduced items-count" type="button"><i class="ti-angle-down"></i></button>


                                <button class="button primary-btn" type="submit">
                                    Add to Cart
                                </button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--================End Single Product Area =================-->

    <!--================Product Description Area =================-->
    <section class="product_description_area">
        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
                       aria-selected="true">Description</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                       aria-controls="contact"
                       aria-selected="false">Comments</a>
                </li>

            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <p>{!! $product->details !!}</p>
                </div>
                <div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="comment_list">

                                @foreach($product->comments as $comment)
                                    <div class="review_item">
                                        <div class="media">
                                            <div class="d-flex">
                                                @if($comment->user->image)
                                                    <img width="30px" height="30px" class="rounded-circle"
                                                         src="{{url('/storage/'.$comment->user->image->name)}}" alt="">

                                                @else
                                                    <img class="img-profile rounded-circle"
                                                         src="{{asset('img/default.jpg')}}" width="30px"
                                                         height="30px">
                                                @endif
                                            </div>
                                            <div class="media-body">
                                                <h4>{{$comment->user->username}}</h4>
                                            </div>

                                            <div>
                                                <small>{{$comment->created_at}}</small>
                                            </div>
                                        </div>
                                        <p>{{$comment->message}}</p>
                                    </div>
                                    <hr>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="review_box">
                                <h4>Post a comment</h4>
                                @include('partials.error')
                                <form class="row contact_form" action="{{route('store',$product->id)}}" method="POST"
                                      id="contactForm" novalidate="novalidate">
                                    @csrf
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                   placeholder="Your Full name">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="email" class="form-control" id="email" name="email"
                                                   placeholder="Email Address">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="phone_number"
                                                   name="phone_number" placeholder="Phone Number">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" name="message" id="message" rows="1"
                                                      placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="button button--active button-review">Submit Now
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection



@section('footer')
    @include('user.ui.footer')
@endsection
