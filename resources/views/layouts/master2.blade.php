<!DOCTYPE html>
<html class="loading bordered-layout" lang="en" data-layout="bordered-layout" data-textdirection="rtl">
	<head>
		@include('layouts.head')
	</head>
	<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
        @yield('content')
        @include('layouts.footer')
        @include('layouts.script')
		@stack('scripts')
	</body>
</html>