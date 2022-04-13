<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->

    @hasPermission('category_list')
    <!-- Categories -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('categories.index')}}" aria-expanded="true">
            <i class="fas fa-sitemap"></i>
            <span>Category</span>
        </a>
    </li>
    @endhasPermission

    @hasPermission('user_list')
    <!-- Users -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('users.index')}}" aria-expanded="true">
            <i class="fas fa-users"></i>
            <span>User</span>
        </a>
    </li>
    @endhasPermission

     {{-- Products --}}
    @hasPermission('product_list')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('products.index')}}"  aria-expanded="true" >
            <i class="fas fa-cubes"></i>
            <span>Products</span>
        </a>
    </li>
    @endhasPermission

        <!-- Roles -->
    @hasPermission('role_list')
    <li class="nav-item">
        <a class="nav-link collapsed" href="{{route('roles.index')}}"  aria-expanded="true" >
            <i class="fas fa-globe"></i>
            <span>Role</span>
        </a>
    </li>
    @endhasPermission
</ul>
