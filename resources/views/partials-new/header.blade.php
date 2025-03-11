<header class="topbar" data-navbarbg="skin6">
    <nav class="navbar top-navbar navbar-expand-lg">
        <div class="navbar-header" data-logobg="skin6">
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a class="nav-toggler waves-effect waves-light d-block d-lg-none" href="javascript:void(0)"><i
                    class="ti-menu ti-close"></i></a>
            <!-- ============================================================== -->
            <!-- Logo -->
            <!-- ============================================================== -->
            <div class="navbar-brand">
                <!-- Logo icon -->
                <a href="/">
                    <img src="{{ asset('assets/images/freedashDark.svg')}}" alt="" class="img-fluid">
                </a>
            </div>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Toggle which is visible on mobile only -->
            <!-- ============================================================== -->
            <a class="topbartoggler d-block d-lg-none waves-effect waves-light" href="javascript:void(0)"
                data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="ti-more"></i></a>
        </div>
        <!-- ============================================================== -->
        <!-- End Logo -->
        <!-- ============================================================== -->
        <div class="navbar-collapse collapse" id="navbarSupportedContent">
            <!-- ============================================================== -->
            <!-- toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-left me-auto ms-3 ps-1">
                <!-- Notification -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle pl-md-3 position-relative" href="javascript:void(0)" id="bell"
                        role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><i data-feather="bell" class="svg-icon"></i></span>
                        <span class="badge text-bg-primary notify-no rounded-circle">{{count($appointments)}}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                        <ul class="list-style-none">
                            <li>
                                <div class="message-center notifications position-relative">                                   
                                    @foreach ($appointments as $appointment)
                                        <a href="javascript:void(0)" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                            <span class="btn btn-success text-white rounded-circle btn-circle"><i
                                            data-feather="calendar" class="text-white"></i></span>
                                            <div class="w-75 d-inline-block v-middle ps-2">
                                                <h6 class="message-title mb-0 mt-1">Hẹn xem xe</h6>
                                                <span class="font-12 text-nowrap d-block text-muted text-truncate">Bạn có 1 lịch hẹn xem xe mới</span>
                                                <span class="font-12 text-nowrap d-block text-muted">{{$appointment->created_at}}</span>
                                            </div>
                                        </a>
                                    @endforeach                       
                                </div>
                            </li>                         
                        </ul>
                    </div>
                </li>
                <!-- End Notification -->
                <!-- ============================================================== -->
                <!-- create new -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i data-feather="settings" class="svg-icon"></i>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <div class="customize-input">
                            <select class="custom-select form-control bg-white custom-radius custom-shadow border-0">
                                <option selected>EN</option>
                                <option value="1">AB</option>
                                <option value="2">AK</option>
                                <option value="3">BE</option>
                            </select>
                        </div>
                    </a>
                </li>
            </ul>
            <!-- ============================================================== -->
            <!-- Right side toggle and nav items -->
            <!-- ============================================================== -->
            <ul class="navbar-nav float-end">
                <!-- ============================================================== -->
                <!-- Search -->
                <!-- ============================================================== -->
                <li class="nav-item d-none d-md-block">
                    <a class="nav-link" href="javascript:void(0)">
                        <form>
                            <div class="customize-input">
                                <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search"
                                    placeholder="Search" aria-label="Search">
                                <i class="form-control-icon" data-feather="search"></i>
                            </div>
                        </form>
                    </a>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <img src="{{ asset('assets/images/undraw_profile.svg')}}" alt="user" class="rounded-circle"
                            width="40">
                        <span class="ms-2 d-none d-lg-inline-block"><span>Hello,</span> <span
                                class="text-dark">{{ Auth::check() ? Auth::user()->username : 'User' }}</span> <i
                                data-feather="chevron-down" class="svg-icon"></i></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end dropdown-menu-right user-dd animated flipInY">
                        @if (Auth::check())
                            <a class="dropdown-item" href="{{route('mypost')}}">
                                <i data-feather="user" class="svg-icon me-2 ms-1"></i>
                                Bài đăng của tôi
                            </a>
                            <a class="dropdown-item" href="{{route('appointment')}}">
                                <i class="icon-calender me-2 ms-1"></i>
                                Lịch xem xe
                            </a>
                            <a class="dropdown-item" href="{{route('save.index')}}">
                                <i class="icon-tag me-2 ms-1"></i>
                                Đã lưu
                            </a>
                            <div class="dropdown-divider"></div>
                            <form action="{{ route('logout')}}" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit">
                                    <i class="icon-logout me-2 ms-1"></i>
                                    Logout
                                </button>
                            </form>
                        @else
                            <a class="dropdown-item" href="{{route('login')}}">
                                <i class="icon-login me-2 ms-1"></i>
                                Login
                            </a>
                        @endif
                    </div>
                </li>
                <!-- ============================================================== -->
                <!-- User profile and search -->
                <!-- ============================================================== -->
            </ul>
        </div>
    </nav>
</header>