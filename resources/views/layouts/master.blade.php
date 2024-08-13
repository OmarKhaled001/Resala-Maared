<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
	<head>
		@include('layouts.head')
	</head>
    <body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="">
		@include('layouts.header')
		@include('layouts.menu')		
        @yield('content')
		@stack('scripts')
        @include('layouts.script')
        @include('layouts.footer')
	</body>
</html>