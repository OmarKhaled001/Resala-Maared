
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
                        <i class="ph ph-calendar-check"></i>
                        <a href="#" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInstructors" data-key="t-instructors"> المشاركات</a>
                        <div class="collapse menu-dropdown" id="sidebarInstructors">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.week1')? 'active': ''}}" href="{{route("events.week1")}}">الاسبوع الاول</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.week2')? 'active': ''}}" href="{{route("events.week2")}}">الاسبوع الثاني</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.week3')? 'active': ''}}" href="{{route("events.week3")}}">الاسبوع الثالث</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.week4')? 'active': ''}}" href="{{route("events.week4")}}">الاسبوع الرابع</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.week5')? 'active': ''}}" href="{{route("events.week5")}}">الاسبوع الخامس</a>
                                </li>
                               
                            </ul>
                        </div>
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
