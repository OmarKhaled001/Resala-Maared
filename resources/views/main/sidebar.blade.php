
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
                        <a class="nav-link menu-link collapsed" href="#sidebarLayouts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarLayouts">
                            <i class="ph-layout"></i><span>@lang('translation.layouts')</span> <span class="badge badge-pill bg-danger" data-key="t-hot">Hot</span>
                        </a>
                        <div class="collapse menu-dropdown" id="sidebarLayouts">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a href="layouts-horizontal" target="_blank" class="nav-link" data-key="t-horizontal">@lang('translation.horizontal')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="layouts-detached" target="_blank" class="nav-link" data-key="t-detached">@lang('translation.detached')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="layouts-two-column" target="_blank" class="nav-link" data-key="t-two-column">@lang('translation.two-column')</a>
                                </li>
                                <li class="nav-item">
                                    <a href="layouts-vertical-hovered" target="_blank" class="nav-link" data-key="t-hovered">@lang('translation.hovered')</a>
                                </li>
                            </ul>
                        </div>
                    </li>

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
