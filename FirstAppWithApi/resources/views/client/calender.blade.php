@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/calender/css/core.css') }}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{ asset('client/calender/css/theme-default.css') }}" class="template-customizer-theme-css">
    {{-- <link rel="stylesheet" href="{{ asset('client/calender/css/demo.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('client/calender/css/rtl.css') }}">
    <link rel="stylesheet" href="{{ asset('client/calender/css/fullcalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('client/calender/css/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('client/calender/css/app-calendar.css') }}">

    <script src="{{ asset('client/calender/js/helpers.js') }}"></script>
    <script src="{{ asset('client/calender/js/config.js') }}"></script>
    <style>
      .panel-layout main .container {
        width: 100%;
        margin: auto;
      }
    </style>
@endpush
@push('scripts')
     
     <script src="{{ asset('client/calender/js/jquery.js') }}"></script>
    <!-- <script src="{{ asset('client/calender/js/popper.js') }}"></script> -->
    <script src="{{ asset('client/calender/js/bootstrap.js') }}"></script>
    <script src="{{ asset('client/calender/js/fullcalendar.js') }}"></script>
    <script src="{{ asset('client/calender/js/select2.js') }}"></script>
    <script src="{{ asset('client/calender/js/i18n/fa.js') }}"></script>
    <script src="{{ asset('client/calender/js/jdate.js') }}"></script>
    <script src="{{ asset('client/calender/js/flatpickr-jdate.js') }}"></script>
    <script src="{{ asset('client/calender/js/l10n/fa-jdate.js') }}"></script>
    <script src="{{ asset('client/calender/js/main.js') }}"></script>
    <script src="{{ asset('client/calender/js/app-calendar.js') }}"></script>
    {{-- <script src="{{ asset('client/calender/js/app-calendar-events.js') }}"></script> --}}
    
@endpush
@section('content')
    <livewire:client.calender />
@endsection


