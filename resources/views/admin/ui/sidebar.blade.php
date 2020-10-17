<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Home</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item active">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
           aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>users</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('users.index')}}">View Users</a>
                <a class="collapse-item" href="{{route('users.create')}}">Add User</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
           aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Categories</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">

                <a class="collapse-item" href="{{route('categories.index')}}">View Categories</a>
                <a class="collapse-item" href="{{route('categories.create')}}">Add Category</a>
            </div>
        </div>
    </li>


    <li class="nav-item">
        <a class="nav-link" href="{{route('products.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Products</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('trashedProducts')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Trashed-Products</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('tags.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Tags</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('get-message')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Messages</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('comment.index')}}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Comments</span></a>
    </li>


</ul>