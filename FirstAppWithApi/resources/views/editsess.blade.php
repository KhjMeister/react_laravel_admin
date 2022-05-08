@extends('layouts.admin')



@section('content')
    <livewire:admin.editsess :sessid="$sessid" />

@endsection

