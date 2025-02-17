<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fa-solid fa-car-side"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Car</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home')}}">
            <i class="fa-solid fa-house"></i>
            <span>Home</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{ route('cars')}}">
            <i class="fa-solid fa-car"></i>
            <span>Car</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    @if (Auth::check() && Auth::user()->role == 'admin')
        <div class="sidebar-heading">
            Manage
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('nhanvien.index')}}">
                <i class="fa-solid fa-users-gear"></i>
                <span>Staff</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('user.index')}}">
                <i class="fa-solid fa-user"></i>
                <span>User</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index')}}">
                <i class="fa-solid fa-file-pen"></i>
                <span>Post</span></a>
        </li>
        <hr class="sidebar-divider">

    @endif
    @if (Auth::check() && Auth::user()->role == 'staff')
        <div class="sidebar-heading">
            Manage
        </div>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('post.index')}}">
                <i class="fa-solid fa-file-pen"></i>
                <span>Post</span></a>
        </li>
        <hr class="sidebar-divider">

    @endif


    <!-- Heading -->

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('images/undraw_rocket.svg')}}" alt="...">
        <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!
        </p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
    </div>

</ul>