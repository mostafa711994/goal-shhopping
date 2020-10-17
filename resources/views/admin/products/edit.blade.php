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
            <div class="container">
                <div class="row mt-8">
                    <div class="col-12 col-md-8 offset-0 offset-md-2">
                        <div class="card shadow shadow-lg border border-primary my-5 ">
                            <div class="card-header">
                                Edit Product
                            </div>
                            <div class="card-body">
                                @include('partials.error')
                                <form action="{{route('products.update',$product->id)}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name"
                                               value="{{$product->name}}"
                                               placeholder="Category's name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="selling_price"
                                               value="{{$product->selling_price}}"
                                               placeholder="selling_price" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="buying_price"
                                               value="{{$product->buying_price}}"
                                               placeholder="Category's name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="discount"
                                               value="{{$product->discount}}"
                                               placeholder="Category's name" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="description"
                                               value="{{$product->description}}"
                                               placeholder="Category's description" required>
                                    </div>
                                    <div class="form-group">
                                        <input id="details" type="hidden" name="details"
                                               value="{!! $product->details !!}">
                                        <trix-editor input="details"></trix-editor>
                                    </div>

                                    <div class="form-group">
                                        <select name="trend" id="trend" class="form-control">
                                            <option>{{$product->trend}}</option>

                                            <option value="is trend">is trend</option>
                                            <option value="not trend">not trend</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="best_seller" id="best_seller" class="form-control">
                                            <option>{{$product->best_seller}}</option>
                                            <option value="best seller">best seller</option>
                                            <option value="not best seller">not best seller</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="is_available" id="is_available" class="form-control">
                                            <option>{{$product->is_available}}</option>
                                            <option value="Sold Out">Sold Out</option>
                                            <option value="In Stock">In Stock</option>

                                        </select>
                                    </div>

                                    <img src="{{url('/storage/'.$product->image->name)}}" width="70px" height="50px"
                                         alt="">
                                    <div class="form-group">
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="form-group">
                                        <select name="category" id="category" class="form-control">
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}"
                                                        @if($category->id === $product->category_id)

                                                        selected

                                                        @endif
                                                >
                                                    {{$category->name}}

                                                </option>

                                            @endforeach
                                        </select>
                                    </div>
                                    @if($tags->count()> 0 )
                                        <div class="form-group">
                                            <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                                                @foreach($tags as $tag)
                                                    <option value="{{$tag->id}}"

                                                            @if($product->hasTag($tag->id))
                                                            selected
                                                            @endif
                                                    >
                                                        {{$tag->name}}

                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Edit Product</button>
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