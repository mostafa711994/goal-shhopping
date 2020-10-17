@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Products</title>
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
                <a href="{{route('products.create')}}" class="btn btn-primary">Add Product</a>
            </div>
            <!-- Begin Page Content -->
            <div class="container-fluid">


                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Products</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if($products->count() > 0)
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
{{--                                        <th>product's Image</th>--}}
                                        <th>Name</th>
                                        <th>Selling Price</th>
                                        <th>Buying Price</th>
                                        <th>discount</th>
{{--                                        <th>Description</th>--}}
{{--                                        <th>Details</th>--}}
{{--                                        <th>Is Available</th>--}}
{{--                                        <th>Trend</th>--}}
{{--                                        <th>Best Seller</th>--}}
                                        <th>View Product</th>
                                        <th>Product's Category</th>
                                        <th>Product's Tags</th>
                                        <th>Edit</th>
                                        <th>Trash</th>

                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
{{--                                        <th>product's Image</th>--}}
                                        <th>Name</th>
                                        <th>Selling Price</th>
                                        <th>Buying Price</th>
                                        <th>discount</th>
{{--                                        <th>Description</th>--}}
{{--                                        <th>Details</th>--}}
{{--                                        <th>Is Available</th>--}}
{{--                                        <th>Trend</th>--}}
{{--                                        <th>Best Seller</th>--}}
                                        <th>View Product</th>
                                        <th>Product's Category</th>
                                        <th>Product's Tags</th>
                                        <th>Edit</th>
                                        <th>Trash</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                    @foreach($products as $product)
                                        <tr>
{{--                                            <td>--}}
{{--                                                <img src="{{url('/storage/'.$product->image->name)}}" width="70px"--}}
{{--                                                     height="50px" alt="">--}}
{{--                                            </td>--}}
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->selling_price}}</td>
                                            <td>{{$product->buying_price}}</td>
                                            <td>{{$product->discount}}</td>
{{--                                            <td>{{$product->description}}</td>--}}
{{--                                            <td>{!! $product->details !!}</td>--}}
{{--                                            <td>{{$product->is_available}}</td>--}}
{{--                                            <td>{{$product->trend}}</td>--}}
{{--                                            <td>{{$product->best_seller}}</td>--}}


                                            <td>
                                                <a href="{{route('show',$product->id)}}">View Product</a>
                                            </td>
                                            <td>
                                                <a href="{{route('categories.edit',$product->category->id)}}">{{$product->category->name}}</a>
                                            </td>
                                            <td>
                                                @foreach($product->tags as $tag)
                                                    <a href="{{route('tags.index')}}">{{$tag->name}}</a>
                                                @endforeach
                                            </td>
                                            <td>
                                                <a href="{{route('products.edit',$product->id)}}"
                                                   class="btn btn-success">Edit</a>
                                            </td>
                                            <td>

                                                <button class="btn btn-danger" onclick="handleForm({{$product->id}})">
                                                    Trash
                                                </button>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            @else
                                <h3 class="text-center">No Products Yet</h3>
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
                                        User</h5>
                                    <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-center text-bold">Are you sure to trash
                                        this product ?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                            data-dismiss="modal">No
                                    </button>
                                    <button type="submit" class="btn btn-danger">
                                        Yes,Trash
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
            form.action = '/products/' + id
            $('#deleteModal').modal('show')

        }

    </script>

@endsection
