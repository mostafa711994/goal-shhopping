@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Messages</title>
</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
@include('admin.ui.sidebar')
<!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
        @include('admin.ui.topbar')
        <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">

                            @foreach($notifications as $notification)
                                <li class="list-group-item">

                                    @if($notification->type === 'App\Notifications\NewMessage')
                                        A new Message has been added by
                                        <strong>
                                            {{$notification->data['message']['name']}}
                                        </strong>
                                        <a class="btn btn-primary btn-sm float-right"
                                           href="{{route('get-message')}}">

                                            View message

                                        </a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>


                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

</body>

</html>

@endsection


