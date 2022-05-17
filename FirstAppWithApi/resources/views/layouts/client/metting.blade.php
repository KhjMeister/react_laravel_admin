<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    
    <link rel="stylesheet" href="{{ asset('client/assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/layout.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/aside.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/nav.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/content.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/navmobile.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/contacts.css') }}" />
    <link rel="stylesheet" href="{{ asset('client/assets/css/kjstyles.css') }}" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'صفحه اصلی') }}</title>
    @stack('styles')

    @livewireStyles
</head>
<body>
    @yield('content')   

     @livewireScripts
     @stack('scripts')
    <script src="{{ asset('client/assets/js/sweetalert2.js') }}"></script>
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top',
            showConfirmButton: false,
            showCloseButton: true,
            timer: 3000,
            timerProgressBar:true,
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        });

        window.addEventListener('alert',({detail:{type,message}})=>{
            Toast.fire({
                icon:type,
                title:message
            })
        })
    </script> 
</body>
</html>
