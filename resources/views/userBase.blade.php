<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Goal Shopping</title>
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')}}">
    <link rel="icon" href="img/Fevicon.png" type="image/png">
{{--    <link rel="stylesheet" href="{{asset('vendor/user/bootstrap/bootstrap.min.css')}}">--}}
    <link rel="stylesheet" href="{{asset('vendor/user/fontawesome/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/user/themify-icons/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/user/nice-select/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/user/owl-carousel/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendor/user/owl-carousel/owl.carousel.min.css')}}">

    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/toastr.min.css')}}">


    @yield('css')

</head>
<body>

<header>
    @yield('header')
</header>

<main>
    @yield('content')
</main>

<footer>
    @yield('footer')
</footer>

{{--<script src="{{asset('https://code.jquery.com/jquery-3.2.1.slim.min.js')}}"--}}
{{--        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"--}}
{{--        crossorigin="anonymous"></script>--}}
{{--<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>}--}}
{{--<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}
{{--<script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js')}}"--}}
{{--        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"--}}
{{--        crossorigin="anonymous"></script>--}}

{{--<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>--}}
{{--<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>--}}

<!-- Core plugin JavaScript-->
{{--<script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>--}}

<!-- Custom scripts for all pages-->
{{--<script src="{{asset('js/sb-admin-2.min.js')}}"></script>--}}
{{--<script src="{{asset('https://code.jquery.com/jquery-3.4.1.slim.min.js"  crossorigin="anonymous')}}"></script>--}}
{{--<script src="{{asset('https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"  crossorigin="anonymous')}}"></script>--}}
{{--<script src="{{asset('https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"  crossorigin="anonymous')}}"></script>--}}

<script src="{{asset('vendor/user/jquery-3.5.1.min.js')}}"></script>
{{--<script src="{{asset('vendor/user/jquery/jquery-3.2.1.min.js')}}"></script>--}}
<script src="{{asset('vendor/user/bootstrap/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/user/skrollr.min.js')}}"></script>
<script src="{{asset('vendor/user/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('vendor/user/nice-select/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendor/user/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('vendor/user/mail-script.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/toastr.min.js')}}"></script>
<script>

    @if(session()->has('success'))

        toastr.success("{{session()->get('success')}}")

    @endif
    @if(session()->has('error'))

    toastr.error("{{session()->get('error')}}")

    @endif

</script>


@yield('js')


</body>
</html>
