@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Categories</title>
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
            <div class="d-flex justify-content-end mr-3">
                <a href="{{route('categories.create')}}" class="btn btn-primary">Add Category</a>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Categories</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($categories->count() > 0)
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>View Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>View Category</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td style="width:5%">
                                                <img src="{{asset('uploads/'.$category->image->name)}}" width="100px"
                                                     height="50px" alt="">
                                            </td>
                                            <td>{{$category->name}}</td>
                                            <td>
                                                <a href="{{route('category',$category->id)}}">View Category</a>
                                            </td>
                                            <td>
                                                <a href="{{route('categories.edit',$category->id)}}"
                                                   class="btn btn-success">Edit</a>
                                            </td>
                                            <td>


                                                <button  class="btn btn-danger" onclick="handleForm({{$category->id}})">
                                                    Delete
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h3 class="text-center">No Categories Yet</h3>
                            @endif
                        </div>
                    </div>
                </div>

                <form id="deleteHandler" action="" method="POST">
                    @csrf
                    @method('DELETE')

                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog"
                         aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Delete
                                       Comment</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">Are you sure to delete
                                        this category permanently?</p>
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
            form.action = '/categories/' + id
            $('#deleteModal').modal('show')

        }

    </script>

@endsection
