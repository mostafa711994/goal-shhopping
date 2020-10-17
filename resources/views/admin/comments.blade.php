@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Comments</title>
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
                        <h6 class="m-0 font-weight-bold text-primary">Comments</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($comments->count() > 0)
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>

                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>User Id</th>
                                        <th>Product Id</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Message</th>
                                        <th>User Id</th>
                                        <th>Product Id</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($comments as $comment)
                                        <tr>

                                            <td>{{$comment->name}}</td>
                                            <td>{{$comment->email}}</td>
                                            <td>{{$comment->phone_number}}</td>
                                            <td>{{$comment->message}}</td>
                                            <td>{{$comment->user_id}}</td>
                                            <td>{{$comment->product_id}}</td>
                                            <td>
                                                <button  class="btn btn-danger" onclick="handleForm({{$comment->id}})">
                                                    Delete
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">No Comments Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>

                <form id="deleteHandler" action="" method="POST">
                    @csrf

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                        Category</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">Are you sure to delete
                                        this comment permanently?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">No
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Yes,Delete
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

</body>

</html>

@endsection


@section('js')
    <script>
        function handleForm(id) {

            let form = document.getElementById('deleteHandler')
            form.action = '/comments/' + id
            $('#deleteModal').modal('show')

        }

    </script>

@endsection
