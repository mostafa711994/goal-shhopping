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
            <div class="container">
                <div class="row mt-8">
                    <div class="col-12 col-md-8 offset-0 offset-md-2">
                        <div class="card shadow shadow-lg border border-primary my-5 ">
                            <div class="card-header">
                                {{$tag->name}}
                            </div>
                            <div class="card-body">
                                @include('partials.error')
                                <form action="{{route('tags.update',$tag->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                               value="{{$tag->name}}" required>
                                    </div>
                                    <br>

                                    <button type="submit" class="btn btn-primary">Edit</button>
                                </form>
                            </div>
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

