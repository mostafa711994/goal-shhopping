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
                    <div class="col-12 col-md-10 offset-0 offset-md-1">
                        <div class="card shadow shadow-lg border border-primary my-5">
                            <div class="card-header">
                                Create Product
                            </div>
                            <div class="card-body">
                                @include('partials.error')
                                <form action="{{route('products.store')}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                               value="{{old('name')}}"
                                               placeholder="Product's name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="selling_price"
                                               value="{{old('selling_price')}}"
                                               placeholder="selling_price" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="buying_price"
                                               value="{{old('buying_price')}}"
                                               placeholder="buying_price" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="discount"
                                               value="{{old('discount')}}"
                                               placeholder="discount" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="description"
                                               value="{{old('description')}}"
                                               placeholder="product's description" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="details" type="hidden" name="details" value="{{old('details')}}">
                                        <trix-editor input="details"></trix-editor>
                                    </div>

                                    <div class="form-group">
                                        <label for="is_available">is_available:</label>
                                        <select name="is_available" id="is_available" class="form-control">

                                            <option value="Sold Out">Sold Out</option>
                                            <option value="In Stock">In Stock</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="trend">Trend:</label>

                                        <select name="trend" id="trend" class="form-control">

                                            <option value="is trend">is trend</option>
                                            <option value="not trend">not trend</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="best_seller">best_seller:</label>
                                        <select name="best_seller" id="best_seller" class="form-control">

                                            <option value="best seller">best seller</option>
                                            <option value="best seller">best seller</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image"
                                               value="{{old('image')}}"
                                               placeholder="Category's name" required>
                                    </div>
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">
                                                    {{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @if($tags->count()> 0 )
                                        <div class="form-group">
                                            <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}">
                                                        {{$tag->name}}

                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary">Add Product</button>
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


@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet"/>

@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $('.tags-selector').select2()
        })
    </script>

@endsection