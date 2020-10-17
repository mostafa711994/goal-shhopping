@extends('userBase')



@section('css')

    <link rel="stylesheet" href="{{asset('/css/profile.css')}}">


@endsection
<!--================ Start Header Menu Area =================-->
@include('user.ui.navbar')
<!--================ End Header Menu Area =================-->

<!-- ================ start banner area ================= -->

@section('content')
    <section class="blog-banner-area" id="category">
        <div class="container h-100">
            <div class="blog-banner">
                <div class="text-center">
                    <h1>Profile</h1>

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
                    <div class="card">

                        @if(auth()->user()->image)
                            <img src="{{url('/storage/'.$user->image->name)}}" alt="John" style="width:100%">

                        @else
                            <img  src="{{asset('img/default2.jpg')}}" width="300px" height="200px">
                        @endif
                            <hr>
                        <h1>{{$user->username}}</h1>
                        <p class="title">{{$user->email}}</p>
                        <p>{{$user->phone_number}}</p>

                       <a href="{{route('shop')}}"><button>Go Shopping</button></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login_form_inner register_form_inner">
                        <h3>Edit your profile</h3>
                        @include('partials.error')
                        <form class="row login_form" action="{{route('profile',$user->id)}}" id="register_form" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" value="{{$user->first_name}}"
                                       name="first_name" placeholder="First name" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'First name'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" value="{{$user->last_name}}"
                                       name="last_name" placeholder="Last name" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Last name'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" value="{{$user->username}}"
                                       name="username" placeholder="Username" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Username'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="email" class="form-control" id="email" value="{{$user->email}}"
                                       name="email" placeholder="Email Address" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Email Address'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="password" class="form-control" value="{{$user->password}}" id="password"
                                       name="password" placeholder="Password" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'Password'" required>
                            </div>


                            <div class="col-md-12 form-group">
                                <input type="file" class="form-control"  name="image">
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" value="{{$user->address}}"
                                       name="address" placeholder="address" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'address'" required>
                            </div>
                            <div class="col-md-12 form-group">
                                <input type="text" class="form-control" id="name" value="{{$user->phone_number}}"
                                       name="phone_number" placeholder="phone_number" onfocus="this.placeholder = ''"
                                       onblur="this.placeholder = 'phone_number'" required>
                            </div>

                            <div class="col-md-12 form-group">
                                <button type="submit" class="button button-register w-100">Edit Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--================End Login Box Area =================-->



    <!--================ Start footer Area  =================-->
    @include('user.ui.footer')
    <!--================ End footer Area  =================-->



@endsection


<!--================ End footer Area  =================-->



