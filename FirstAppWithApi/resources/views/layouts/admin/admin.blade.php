<!doctype html>
<html class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'صفحه اصلی') }}</title>

    @stack('styles')

    <link rel="icon" type="image/x-icon" href="{{ asset('admin/frest/img/favicon/favicon.ico') }}">

    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/fonts/boxicons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/fonts/flag-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/css/rtl/core.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/css/rtl/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/css/demo.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/css/rtl/rtl.css') }}">

    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/frest/vendor/libs/typeahead-js/typeahead.css') }}">
    
</head>
<body>


    @yield('content')  


    <script src="{{ asset('admin/frest/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/frest/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/frest/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/frest/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/frest/vendor/libs/hammer/hammer.js') }}"></script>

    <script src="{{ asset('admin/frest/vendor/libs/i18n/i18n.js') }}"></script>
    <script src="{{ asset('admin/frest/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    <script src="{{ asset('admin/frest/vendor/js/menu.js') }}"></script>

    @stack('scripts')

</body>
</html>
