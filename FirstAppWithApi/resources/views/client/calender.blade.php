@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/main.css') }}">
<style>
        #external-events {
          width: 200px;
          padding: 0 10px;
          background: #eee;
          text-align: right;
          border-radius: 4px;
          width: 20%;
        }
    
        #external-events h4 {
          font-size: 16px;
          margin-top: 0;
          padding-top: 1em;
        }
    
        #external-events .fc-event {
          margin: 3px 0;
          cursor: move;
          padding: 1rem;
        }
    
        #external-events p {
          margin: 1.5em 0;
          font-size: 11px;
          color: #666;
        }
    
        #external-events p input {
          margin: 0;
          vertical-align: middle;
        }
    
        #calendar-wrap {
          width: 60%;
        }
    
        #calendar {
          width: 100%;
          margin: 0 auto;
          direction: ltr !important;
        }
    
        .my-calendare {
          display: flex;
          justify-content: space-around;
          flex-direction: row-reverse;
        }
    
        .fc-scrollgrid {
          border-radius: 8px;
        }
    
        .fc-direction-ltr {
          text-align: right;
        }
    
        .btn-sidebar {
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          background-color: rgb(250, 250, 250);
          border-radius: 4px;
          overflow: hidden;
        }
    
        .btn-sidebar input {
          width: 80%;
          padding: .7rem;
          border: none;
          background-color: transparent;
          direction: rtl;
          font-family: "Sahel" !important;
        }
    
        .btn-sidebar button {
          width: 20%;
          padding: .7rem;
          border: none;
          background-color: rgb(0, 0, 0);
          color: whitesmoke;
          cursor: pointer;
          font-family: "Sahel" !important;
        }
    
        .colors ul {
          list-style: none;
          display: flex;
          justify-content: space-between;
          background-color: #eee;
        }
    
        .colors ul li {
          width: 10px;
          padding: 1rem;
          border-radius: 8px;
          cursor: pointer;
        }
      </style>
@endpush
@push('scripts')
    {{-- <script src="{{ asset('client/assets/js/main.js') }}"></script>
    <script src="{{ asset('client/assets/js/js-cale-fa.js') }}"></script> --}}
@endpush
@section('content')
    <livewire:client.calender />
@endsection


