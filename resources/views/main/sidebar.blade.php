
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
                    <li class="menu-title"><span data-key="t-menu">التقارير</span></li>
                    <li class="nav-item">
                        
                        <a href="#week" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInstructors" data-key="t-instructors"><i class="ph ph-calendar-check"></i>

                            المشاركات</a>
                        <div class="collapse menu-dropdown" id="week">
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
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.contribution')? 'active': ''}}" href="{{route("events.contribution")}}">شيت المتابعة</a>
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#events" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInstructors" data-key="t-instructors"><i class="ph ph-squares-four"></i>

                            الاحداث</a>
                        <div class="collapse menu-dropdown" id="events">
                            <ul class="nav nav-sm flex-column">
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.driver')? 'active': ''}}" href="{{route("events.driver")}}">النقل</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.meeting')? 'active': ''}}" href="{{route("events.meeting")}}">الاجتماعات</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.maared')? 'active': ''}}" href="{{route("events.maared")}}">المعارض</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.maared')? 'active': ''}}" href="{{route("events.maared")}}">المعارض</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.etaam')? 'active': ''}}" href="{{route("events.etaam")}}">الاطعام</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.tahady')? 'active': ''}}" href="{{route("events.tahady")}}">ابطال تحدي</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('events.markting')? 'active': ''}}" href="{{route("events.markting")}}">دعاية</a>
                                </li> --}}
                               
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a href="#team" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarInstructors" data-key="t-instructors"> <i class="ph ph-users-three"></i>

                            فريق العمل</a>
                        <div class="collapse menu-dropdown" id="team">
                            <ul class="nav nav-sm flex-column">
                               
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('team.masaol')? 'active': ''}}" href="{{route("team.masaol")}}">مسئول</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('team.mmasaol')? 'active': ''}}" href="{{route("team.mmasaol")}}">مشروع مسئول</a>
                                </li>
                            
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('team.new')? 'active': ''}}" href="{{route("team.new")}}">جديد</a>
                                </li>
                            
                               
                                <li class="nav-item">
                                    <a class="nav-link menu-link {{Request::url() == route('team.birthdate')? 'active': ''}}" href="{{route("team.birthdate")}}">اعياد الملاد</a>
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
