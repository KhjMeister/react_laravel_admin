@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/listmeeting.css') }}">
@endpush

@push('scripts')
   <script>
        
   </script>
@endpush

@section('content')

    <livewire:client.list-session />
        
@endsection
