@extends('userBase')
<!--================ Start Header Menu Area =================-->
@section('header')
    @include('user.ui.navbar')
    <!--================ End Header Menu Area =================-->
@endsection
<!-- ================ start banner area ================= -->
@section('content')
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Shopping Cart</h1>
                    <nav aria-label="breadcrumb" class="banner-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- ================ end banner area ================= -->



    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">
            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        @if(Cart::content()->count() > 0)
                        <thead>
                        <tr>
                            <th scope="col">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total</th>
                            <th>Delete</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach(Cart::content() as $pdt)

                            <tr>



                                <td>
                                    <div class="media">
                                        <div class="d-flex">
{{--                                            <img width="100px" height="70px"--}}
{{--                                                 src="{{url('/storage/'.$pdt->model->image->name)}}" alt="">--}}
                                        </div>
                                        <div class="media-body">
                                            <p>{{$pdt->name}}</p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>${{$pdt->price}}</h5>
                                </td>
                                <td>
                                    <div class="product_count">
                                        <input type="text" name="qty" id="sst" maxlength="12" value="{{$pdt->qty}}"
                                               title="Quantity:"
                                               class="input-text qty">
                                        <a href="{{route('cart-incr',['id'=>$pdt->rowId,'qty'=>$pdt->qty])}}">
                                            <button class="increase items-count" type="button"><i class="ti-angle-up"></i></button>
                                        </a>
                                        <a href="{{route('cart-dcr',['id'=>$pdt->rowId,'qty'=>$pdt->qty])}}">
                                            <button class="reduced items-count" type="button"><i class="ti-angle-down"></i></button>
                                        </a>

                                    </div>
                                </td>
                                <td>
                                    <h5>${{$pdt->total()}}</h5>
                                </td>

                                <td>
                                    <a href="{{route('cart-delete',['id' =>$pdt->rowId])}}">
                                        <i class="fas fa-trash-alt" style= "margin-left: 15px"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bottom_button">



                        </tr>
                        <tr>
                            <td>

                            </td>
                            <td>

                            </td>
                            <td>
                                <h5>Subtotal</h5>
                            </td>
                            <td>
                                <h5>${{Cart::subTotal()}}</h5>
                            </td>
                        </tr>
{{--                        <tr class="shipping_area">--}}
{{--                            <td class="d-none d-md-block">--}}

{{--                            </td>--}}
{{--                            <td>--}}

{{--                            </td>--}}

{{--                        </tr>--}}
                        <tr class="out_button_area">
                            <td class="d-none-l">

                            </td>
                            <td class="">

                            </td>
                            <td>

                            </td>
                            <td>
                                <div class="checkout_btn_inner d-flex align-items-center">
                                    <a class="gray_btn" href="{{route('shop')}}">Continue Shopping</a>
                                    <a class="primary-btn ml-2" href="{{route('create-order')}}">Proceed to checkout</a>
                                </div>
                            </td>
                        </tr>

                        </tbody>
                        @else

                            <h4 class="text-center">You have to put some products , <a href="{{route('shop')}}">go shopping</a></h4>

                        @endif
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--================End Cart Area =================-->
@endsection


<!--================ Start footer Area  =================-->
@section('footer')
    @include('user.ui.footer')
    <!--================ End footer Area  =================-->
@endsection


