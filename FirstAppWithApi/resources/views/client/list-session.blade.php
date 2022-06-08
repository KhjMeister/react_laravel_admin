@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/listmeeting.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession2.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createMeet3.css') }}" >
    <link rel="stylesheet" href="{{ asset('client/assets/css/persian-datepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/paginate.css') }}">


@endpush

@push('scripts')
   {{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
    <script type="text/javascript" src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('client/assets/js/persian-datepicker.js') }}"></script>
    <script type="text/javascript">
    $(document).ready(function () {
        $('#datepicker1').datepicker();
    });
    </script>
@endpush

@section('content')

    <livewire:client.list-session />
        
@endsection
