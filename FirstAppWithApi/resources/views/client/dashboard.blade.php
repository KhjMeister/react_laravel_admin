@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/mainContent.css') }}">
@endpush

@section('content')

    <livewire:client.dashboard />
        
@endsection
