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
                        <div class="table-responsive">
                            @if($messages->count() > 0)
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Body</th>
                                        <th>User</th>


                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Subject</th>
                                        <th>Body</th>
                                        <th>User</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($messages as $message)
                                        <tr>

                                            <td>{{$message->name}}</td>
                                            <td>{{$message->email}}</td>
                                            <td>{{$message->subject}}</td>
                                            <td>{{$message->body}}</td>
                                            <td>{{$message->user_id}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">No messages Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>

</body>

</html>

@endsection


