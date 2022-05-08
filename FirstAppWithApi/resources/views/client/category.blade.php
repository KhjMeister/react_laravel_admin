@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/categories.css') }}">
@endpush
@push('scripts')
    <script src="{{ asset('client/assets/js/category.js') }}"></script>
@endpush
@section('content')
    <livewire:client.category />
@endsection


