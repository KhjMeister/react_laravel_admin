<!doctype html>
<html dir="rtl" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link  href="{{ asset('rv/img/favicon2.gif') }}" type="image/png" rel="icon">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ویدیو رایان') }}</title>
    <style>
        /* .bg-question{
            background-image: url('../images/parallax1-1.jpg')
        } */
        @keyframes slideInFromLeft {
            0% {
                transform: translateY(-100%);
            }
            100% {
                transform: translateY(0);
            }
        }
        .content-question {  
        
        animation: 1s ease-out 0s 1 slideInFromLeft;
        
        
        padding: 30px;
        }

    </style>
    
    {{-- Scripts --}}
     <script src="{{ asset('js/jquery3.6.js') }}" defer></script> 

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.rtl.css') }}">
    <!-- ! my styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- ! owl carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <!-- ! aos -->
    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">
    @livewireStyles
        
</head>
<body class="bg-question">
  
    

        <main class="py-4">
            @yield('content')
        </main>
    
    <!-- ! scripts -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery3.6.js') }}"></script>
    <script src="{{ asset('js/notify.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    
    <!-- <script src="{{ asset('js/owl.carousel.min.js') }}"></script> -->
    <script>
    
        
            $(".finish").notify("با موفقیت ثبت شد ! ","info" );
        
    </script>
    <!-- ? aos -->
    <script src="{{ asset('js/aos.js') }}"></script>
    <script>
        AOS.init();
    </script>
    <script type="text/javascript">
        var url = "{{ route('changeLang') }}";
        $(".changeLang").change(function(){
            window.location.href = url + "?lang="+ $(this).val();
        });
    
    </script>
    
    <script>
        var valimg="../images/parallax1-1.jpg";
        jQuery(".bg-question").css("background-image",'url('+ valimg +')');
        jQuery(".bg-question").hide().fadeIn(1500);
    </script>
        @livewireScripts

</body>
</html>
