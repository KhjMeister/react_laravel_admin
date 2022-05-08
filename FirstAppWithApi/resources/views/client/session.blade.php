@extends('layouts.client.client')

@push('styles')
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/createSession2.css') }}">
@endpush

@push('scripts')
   <script>
        const btn = document.getElementById('add-contact');
        const modalAddContact = document.getElementById('modal');
        const closeModal = document.getElementById('closeModal');
        window.onclick = function(event) {
            if (event.target == modalAddContact) {
                modalAddContact.style.display = "none";
            }
        }
        btn.addEventListener("click", () => {
            modalAddContact.style.display = "block"
        });

        closeModal.addEventListener("click", () => {
            modalAddContact.style.display = "none"
        });


   </script>
@endpush

@section('content')

    <livewire:client.session />
        
@endsection
