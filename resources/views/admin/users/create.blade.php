@extends('base')

@section('content')
        <!doctype html>

<html lang="en">

<head>
    <title>Users</title>
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
                                Create User
                            </div>
                            <div class="card-body">
                                @include('partials.error')
                                <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <input type="text" class="form-control" name="first_name"
                                           value="{{old('first_name')}}"

                                           placeholder="Enter First Name" required>
                                    <br>
                                    <input type="text" class="form-control" name="last_name"
                                           value="{{old('last_name')}}"
                                           placeholder="Enter Last Name" required>
                                    <br>
                                    <input type="text" class="form-control" name="username"
                                           value="{{old('username')}}"
                                           placeholder="Enter Username" required>
                                    <br>
                                    <input type="email" class="form-control" name="email"
                                           value="{{old('email')}}"
                                           placeholder="Enter user email" required>
                                    <br>
                                    <div class="form-group">

                                        <select name="role" id="" class="form-control">
                                            <option value='User'>Select Option</option>
                                            <option value='admin'>admin</option>
                                            <option value='User'>user</option>
                                        </select>
                                    </div>

                                    <input type="text" class="form-control" name="phone_number"
                                           value="{{old('phone_number')}}"
                                           placeholder="Enter user phone number" required>
                                    <br>
                                    <input type="text" class="form-control" name="address"
                                           value="{{old('address')}}"
                                           placeholder="Enter user address" required>
                                    <br>

                                    <input type="file" class="form-control" name="image">
                                    <br>

                                    <input type="password" class="form-control" name="password"
                                           value="{{old('password')}}"
                                           placeholder="Enter user Password" required>
                                    <br>
                                    <button type="submit" class="btn btn-primary">Add User</button>
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

