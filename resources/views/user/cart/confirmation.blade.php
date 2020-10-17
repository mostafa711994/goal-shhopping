@extends('userBase')

<!--================ Start Header Menu Area =================-->


@include('user.ui.navbar')



<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Order Confirmation</h1>

            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->

<!--================Order Details Area =================-->
<section class="order_details section-margin--small">
    <div class="container">
        <p class="text-center billing-alert">Thank you. Your order has been received.</p>

        <div class="text-center">
            <a href="{{route('home')}}">Back to home page</a>
        </div>
    </div>
</section>
<!--================End Order Details Area =================-->



<!--================ Start footer Area  =================-->
@section('footer')
    @include('user.ui.footer')
@endsection
    <!--================ End footer Area  =================-->



