@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/contacts.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('client/assets/js/modal.js') }}"></script>
@endpush

@section('content')
    <livewire:client.contact />
@endsection

