@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/profile.css') }}">
@endpush

@push('scripts')
   
@endpush

@section('content')

    <livewire:client.profile />
        
@endsection
