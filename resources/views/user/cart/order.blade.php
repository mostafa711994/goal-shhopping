@extends('userBase')

<!--================ Start Header Menu Area =================-->
@section('header')
@include('user.ui.navbar')
@endsection
<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->
@section('content')
<section class="blog-banner-area" id="category">
    <div class="container h-100">
        <div class="blog-banner">
            <div class="text-center">
                <h1>Product Checkout</h1>
                <nav aria-label="breadcrumb" class="banner-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->


<!--================Checkout Area =================-->
<section class="checkout_area section-margin--small">
    <div class="container">

        <div class="billing_details">
            <div class="row">
                <div class="col-lg-8">
                    <h3>Billing Details</h3>
                    @include('partials.error')
                    <form class="row contact_form" action="{{route('store-order')}}" method="POST"
                          novalidate="novalidate">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="first" name="name" placeholder="Your name"
                                   required>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="number" name="phone_number"
                                   placeholder="Phone Number" required>
                        </div>

                        <div class="col-md-12 form-group p_star">
                            <select name="country" class="country_select">
                                <option value="Egypt">Egypt</option>
                                <option value="England">England</option>
                                <option value="France">France</option>
                                <option value="Canada">Canada</option>

                            </select>
                        </div>
                        <div class="col-md-12 form-group p_star">
                            <input type="text" class="form-control" id="add1" name="address" placeholder="Address"
                                   required>
                        </div>


                        <div class="col-md-12 form-group">
                            <input type="text" class="form-control" id="zip" name="zip" placeholder="Postcode/ZIP">
                        </div>

                        <div class="col-md-12 form-group">

                            <textarea class="form-control" name="note" id="message" rows="1"
                                      placeholder="Order Notes"></textarea>
                        </div>
                        <div class="text-center">
                            <button class="button button-paypal">Proceed to Payment</button>
                        </div>
                    </form>
                </div>
                <div class="col-lg-4">
                    <div class="order_box">
                        <h2>Your Order</h2>

                            <ul class="list">
                                <li><a href="#"><h4>Products <span>{{Cart::content()->count()}}</span></h4></a></li>
                                @foreach(Cart::content() as $item)
                                <li><a href="#">{{$item->name}}<span class="middle text-center">x{{$item->qty}}</span> <span
                                                class="last">${{Cart::total()}}</span></a>
                                </li>
                                @endforeach
                            </ul>

                            <ul class="list list_2">
                                <li><a href="#">Subtotal <span>${{Cart::subTotal()}}</span></a></li>

                            </ul>


                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Checkout Area =================-->
@endsection

<!--================ Start footer Area  =================-->

@section('footer')
@include('user.ui.footer')
<!--================ End footer Area  =================-->

@endsection

