@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession2.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createMeet3.css') }}" />
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css"> --}}
    <link rel="stylesheet" href="{{ asset('client/assets/css/persian-datepicker.css') }}" />

@endpush

@push('scripts')
 {{-- <script type="text/javascript" src="{{ asset('client/assets/js/jdatepicker.js') }}"></script>  --}}

{{-- <script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>
<script>
    var field = document.getElementById('datepicker');
    var picker = new Pikaday({
        onSelect: function(date) {
            field.value = picker.toString();
        }
    });
    field.parentNode.insertBefore(picker.el, field.nextSibling);
</script> --}}

{{-- <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script> --}}
<script type="text/javascript" src="{{ asset('client/assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('client/assets/js/persian-datepicker.js') }}"></script>
<script type="text/javascript">
$(document).ready(function () {
    $('#datepicker').datepicker();
});
</script>
   <script type="text/javascript">        
        // const btn = document.getElementById('add-contact');
        // const modalAddContact = document.getElementById('modal');
        // const closeModal = document.getElementById('closeModal');
        // window.onclick = function(event) {
        //     if (event.target == modalAddContact) {
        //         modalAddContact.style.display = "none";
        //     }
        // }
        // btn.addEventListener("click", () => {
        //     modalAddContact.style.display = "block"
        // });
        // closeModal.addEventListener("click", () => {
        //     modalAddContact.style.display = "none"
        // });
   </script>
@endpush

@section('content')

    <livewire:client.session />
        
@endsection
