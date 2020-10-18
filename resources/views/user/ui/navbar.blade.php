<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand logo_h" href="{{route('home')}}"><img  src="{{asset('img/Fevicon.png')}}"  alt=""><img
                            src="{{asset('img/GOAL.gif')}}" height="100px" width= "100px"  alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent"
                        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
                        <li class="nav-item"><a class="nav-link" style="font-size: large" href="{{route('home')}}">Home</a></li>
                        <li class="nav-item submenu dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false" style="font-size: large">Categories</a>
                            <ul class="dropdown-menu">
                                @foreach($categories as $category)
                                    <li class="nav-item"><a class="nav-link" href="{{route('category',$category->id)}}">{{$category->name}}</a></li>

                                @endforeach
                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" style="font-size: large" href="{{route('shop')}}">Shop</a></li>
                        <li class="nav-item"><a class="nav-link" style="font-size: large" href="{{route('contact')}}">Contact Us</a></li>


                    </ul>

                    <ul class="nav-shop">
                        @if(Auth::check())

                            @if(auth()->user()->isAdmin())
                                <li class="nav-item"><a class="nav-link" href="{{route('dashboard')}}">Admin area</a>
                                </li>
                            @endif

                            <li class="nav-item">
                                    <button>
                                        <a href="{{route('cart')}}">
                                            <i class="ti-shopping-cart"></i>
                                            @if(Cart::content()->count() !== 0)
                                                <span class="nav-shop__circle">{{Cart::count()}}</span>
                                            @endif
                                        </a>

                                    </button>
                                </li>

                                <li class="nav-item dropdown no-arrow">

                                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                       data-toggle="dropdown"
                                       aria-haspopup="true" aria-expanded="true">
                                        <span class="mr-2 d-none d-lg-inline text-gray-600 small my-2">{{auth()->user()->username}}</span>
                                        @if(auth()->user()->image)
                                            <img class="img-profile rounded-circle"
                                                 src="{{url('uploads/'.auth()->user()->image->name)}}" width="30px"
                                                 height="30px">
                                        @else
                                            <img class="img-profile rounded-circle"
                                                 src="{{asset('img/default2.jpg')}}" width="30px"
                                                 height="30px">
                                        @endif
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                         aria-labelledby="userDropdown">
                                        <a class="dropdown-item" href="{{route('show-profile',auth()->user()->id)}}">
                                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Profile
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{route('logout')}}">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                            Logout
                                        </a>
                                    </div>

                                    <!-- Dropdown - User Information -->
                                </li>

                        @else
                            <li class="nav-item float-right" style=""><a class="button button-header" href="{{route('register')}}">Sign up</a></li>
                            <li class="nav-item "><a class="button button-header" href="{{route('login')}}">Login</a>
                            </li>
                        @endif

                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
