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
                <h1>Login / Register</h1>

            </div>
        </div>
    </div>
</section>
<!-- ================ end banner area ================= -->

<!--================Login Box Area =================-->
<section class="login_box_area section-margin">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="login_box_img">
                    <div class="hover">
                        <h4>New to our website?</h4>
                        <p>There are advances being made in science and technology everyday, and a good example of this is the</p>
                        <a class="button button-account" href="{{route('register')}}">Create an Account</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="login_form_inner">
                    <h3>Log in to enter</h3>
                    @include('partials.error')

                    <form class="row login_form" action="{{route('login')}}" id="contactForm" method="POST">
                        @csrf
                        <div class="col-md-12 form-group">
                            <input value="{{old('username')}}" type="text" class="form-control" id="name" name="username" placeholder="Username" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Username'">
                        </div>
                        <div class="col-md-12 form-group">
                            <input type="password" class="form-control" id="name" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'">
                        </div>

                        <div class="col-md-12 form-group">
                            <button type="submit" value="submit" class="button button-login w-100">Log In</button>
{{--                            <a href="{{route('forgot')}}">Forgot Password?</a>--}}
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!--================End Login Box Area =================-->



<!--================ Start footer Area  =================-->
<!--================ End footer Area  =================-->

@endsection


@section('footer')
    @include('user.ui.footer')

@endsection
