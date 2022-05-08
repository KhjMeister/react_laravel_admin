<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ویدیو رایان') }}</title>
    <link  href="{{ asset('rv/img/favicon2.gif') }}" type="image/png" rel="icon">
   
    <link rel="stylesheet" href="{{ asset('rv/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/perfect-scrollbar.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/emoji.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/styleRTL.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/myCss.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/createmeeting.css') }}">
    <link rel="stylesheet" href="{{ asset('rv/css/persianDatepicker-default.css') }}" />


@stack('styles')

    @livewireStyles
</head>
<body class="bg-light">

    
@yield('content')
    @livewireScripts
    <script src="{{ asset('rv/js/jquery3.3.1.js') }}"></script>
    <script src="{{ asset('rv/js/vendor/jquery-slim.min.js') }}"></script>
    <script src="{{ asset('rv/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('rv/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('rv/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('rv/js/persianDatepicker.min.js') }}"></script>
    <script src="{{ asset('rv/js/script.js') }}"></script>
    <script type="text/javascript">
         const btn = document.getElementById("btn");
        const close = document.getElementById("close");
        const mymodal = document.getElementById("startnewVoice");
        const inviteButton = document.getElementById("inviteButton");
        const linkModal = document.getElementById("LinkModal");
        const closeLink = document.getElementById("closeLink");



        btn.addEventListener("click", () => {
            mymodal.style.display = "block"
        })

        close.addEventListener("click", () => {
            mymodal.style.display = "none"
        })

        inviteButton.addEventListener("click", () => {
            linkModal.style.display = "flex"
        })

        closeLink.addEventListener("click", () => {
            linkModal.style.display = "none"
        })
    </script>
    <script type="text/javascript">
        var imgCount = 3;
        var dir = 'img/bg/';
        var randomCount = Math.round(Math.random() * (imgCount - 1)) + 1;
        var images = new Array
        images[1] = "1.jpg",
        images[2] = "2.jpg",
        images[5] = "5.jpg",
        images[6] = "6.jpg",
        images[7] = "7.jpg",
        images[8] = "8.jpg",
        images[9] = "9.jpg",
        images[10] = "10.jpg",
        images[11] = "11.jpg",
            document.getElementById("divID").style.backgroundImage = "url(" + dir + images[randomCount] + ")"; 
        
    </script>
   <script>
        $("#input1").persianDatepicker({
            formatDate: "YYYY/MM/DD hh:mm:ss",
            cellWidth: 33,
            cellHeight: 20,
            fontSize: 12,
            // onSelect: function () {
            //     $("#input1").attr("data-gdate");
            //     const t =  document.getElementById('input1');
            //     const value  = $('#input1').attr("data-gdate");
            //     t.setAttribute('value',value);

            //     console.log(t);
                
            // }
        
        });
        
            
            
        
        $("#input2").persianDatepicker({
            formatDate: "YYYY/MM/DD hh:mm:ss",
            cellWidth: 33,
            cellHeight: 20,
            fontSize: 12,
            // onSelect: function () {
            //     $("#input2").attr("data-gdate")
            //     const t =  document.getElementById('input2');
            //     const value  = $('#input2').attr("data-gdate");
            //     t.setAttribute('value',value);
            //     console.log(t);
            // }
        });
        
    </script>
</body>
</html>
