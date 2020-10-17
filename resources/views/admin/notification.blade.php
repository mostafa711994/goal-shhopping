@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Notifications</title>
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
                        <h6 class="m-0 font-weight-bold text-primary">Notifications</h6>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            @foreach($notifications as $notification)

                                <li class="list-group-item">

                                    @if($notification->type === 'App\Notifications\NewProduct')
                                        A new product has been added
                                        <strong>
                                            {{$notification->data['product']['name']}}
                                        </strong>
                                        <a class="btn btn-primary btn-sm float-right"
                                           href="{{route('show',$notification->data['product']['id'])}}">

                                            View product

                                        </a>

                                    @endif

                                        @if($notification->type === 'App\Notifications\NewComment')
                                            A new comment has been added by
                                            <strong>
                                                {{$notification->data['comment']['name']}}
                                            </strong>
                                            <a class="btn btn-primary btn-sm float-right"
                                               href="{{route('show',$notification->data['comment']['id'])}}">

                                                View comment

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


