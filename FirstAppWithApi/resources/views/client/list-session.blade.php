@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/listmeeting.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession2.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createMeet3.css') }}" >
@endpush

@push('scripts')
   <script>
        
   </script>
@endpush

@section('content')

    <livewire:client.list-session />
        
@endsection
