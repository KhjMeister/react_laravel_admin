@extends('layouts.client.metting')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/otp.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/list-peresent.css') }}" />
@endpush

@push('scripts')
   <script>
        
   </script>
@endpush

@section('content')

    <livewire:client.metting :link="$link" />
        
@endsection
