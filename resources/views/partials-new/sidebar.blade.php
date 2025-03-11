<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar" data-sidebarbg="skin6">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('home')}}" aria-expanded="false">
                        <i class=" icon-chart"></i>
                        <span class="hide-menu">Thống kê</span></a>
                </li>
                
            
                <li class="sidebar-item">
                    <a class="sidebar-link" aria-expanded="false" href="{{ route('cars')}}">
                        <i class="fas fa-car"></i>
                        <span class="hide-menu">Car</span></a>
                </li>
            
            
                @if (Auth::check() && Auth::user()->role == 'admin')
                    <li class="list-divider"></li>
                    <li class="nav-small-cap"><span class="hide-menu">Quản lý</span></li>
            
                    <li class="sidebar-item">
                        <a class="sidebar-link" aria-expanded="false" href="{{ route('user.index')}}">
                            <i class="icon-people"></i>
                            <span class="hide-menu">Người dùng</span></a>
                    </li>
            
                    <li class="sidebar-item">
                        <a class="sidebar-link" aria-expanded="false" href="{{ route('post.index')}}">
                            <i class="far fa-file-alt"></i>
                            <span class="hide-menu">Bài viết</span></a>
                    </li>
            
                    <li class="sidebar-item">
                        <a class="sidebar-link" aria-expanded="false" href="{{ route('admin.manage')}}">
                            <i class="icon-settings"></i>
                            <span class="hide-menu">Dữ liệu</span></a>
                    </li>
                    <hr class="sidebar-divider">
            
                @endif
                @if (Auth::check() && Auth::user()->role == 'staff')
                    <div class="sidebar-heading">
                        Manage
                    </div>
            
                    <li class="sidebar-item">
                        <a class="sidebar-link" aria-expanded="false" href="{{ route('post.index')}}">
                            <i class="far fa-file-alt"></i>
                            <span class="hide-menu">Bài viết</span></a>
                    </li>
                    <li class="list-divider"></li>
            
                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>