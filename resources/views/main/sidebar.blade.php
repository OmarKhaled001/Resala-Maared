
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
        <div class="navbar-brand-box">
            <a href="{{route('home')}}" class="logo logo-dark">
                <span class="logo-sm">
                    <img src="{{ asset('assets-dashboard/images/logo-sm.png') }}" alt="" height="44">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets-dashboard/images/logo-dark.png') }}" alt="" height="44">
                </span>
            </a>
            <a href="{{route('home')}}" class="logo logo-light">
                <span class="logo-sm">
                    <img src="{{ asset('assets-dashboard/images/logo-sm.png') }}" alt="" height="44">
                </span>
                <span class="logo-lg">
                    <img src="{{ asset('assets-dashboard/images/logo-light.png') }}" alt="" height="44">
                </span>
            </a>
            <button type="button" class="btn btn-sm p-0 fs-3xl header-item float-end btn-vertical-sm-hover" id="vertical-hover">
                <i class="ri-record-circle-line"></i>
            </button>
        </div>
        <div id="scrollbar">
            <div class="container-fluid">

                <div id="two-column-menu">
                </div>
                <ul class="navbar-nav" id="navbar-nav">

                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('home')? 'active': ''}}" href="{{route('home')}}">
                            <i class="ph ph-house"></i><span data-key="t-index">الرئيسية</span>
                        </a>
                    </li>
                    <li class="menu-title"><span data-key="t-menu">Settings</span></li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('events.week1')? 'active': ''}}" href="{{route("events.week1")}}">
                            <i class="ph-address-book"></i> <span data-key="t-pages">الاسبوع الاول</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('events.week2')? 'active': ''}}" href="{{route("events.week2")}}">
                            <i class="ph-address-book"></i> <span data-key="t-pages">الاسبوع الثاني</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('events.week3')? 'active': ''}}" href="{{route("events.week3")}}">
                            <i class="ph-address-book"></i> <span data-key="t-pages">الاسبوع الثالث</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('events.week4')? 'active': ''}}" href="{{route("events.week4")}}">
                            <i class="ph-address-book"></i> <span data-key="t-pages">الاسبوع الرابع</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Request::url() == route('events.week5')? 'active': ''}}" href="{{route("events.week5")}}">
                            <i class="ph-address-book"></i> <span data-key="t-pages">الاسبوع الخامس</span>
                        </a>
                    </li>
                    
                </ul>
            </div>
            <!-- Sidebar -->
        </div>

        <div class="sidebar-background"></div>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>
