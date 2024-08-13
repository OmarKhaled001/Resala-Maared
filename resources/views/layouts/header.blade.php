    <!-- BEGIN: Header-->
    <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><i class="ficon" data-feather="menu"></i></a></li>
            </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-xl-flex d-xs-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="user-nav d-xl-flex d-xs-none"><span class="user-name fw-bolder">{{Auth::user()->name}}</span></div><span class="avatar"><img class="round" src="{{asset("app-assets/images/portrait/small/avatar-s-11.png")}}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span></a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="page-profile.html"><i class="me-50" data-feather="user"></i> الملف الشخصية</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="page-account-settings-account.html"><i class="me-50" data-feather="settings"></i> الإعدادت</a>
                <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a class="dropdown-item" href="#"onclick="event.preventDefault();this.closest('form').submit();"><i class="bx bx-log-out"></i>تسجيل الخروج</a>
            </form>
                
                </div>
            </li>
            </ul>
        </div>
        </nav>
        <!-- END: Header-->