@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/historymeeting.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/paginate.css') }}">
    <style>
    .mypagination{
        margin-top:1px;
    }
</style>

@endpush

@push('scripts')
   <script>
        
   </script>
@endpush

@section('content')

    <livewire:client.history-metting />
        
@endsection
