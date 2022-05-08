<!DOCTYPE html>
<html dir="rtl" lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="google-site-verification" content="KCULpGQAVEiYeRxNnbS01EdgWd4MM1hfmt29fFmZLi0" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="application-name" content="FS">
    <meta name="apple-mobile-web-app-title" content="FS">
    <meta name="theme-color" content="#343a40">
    <meta name="msapplication-navbutton-color" content="#343a40">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="msapplication-starturl" content="/">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <meta name="title" content="@yield('title', 'Video Rayan')">
    <title>@yield('title', 'Video Rayan')</title>
    <link  href="{{ asset('rv/img/favicon2.gif') }}" type="image/png" rel="icon">
    
    <link href="{{asset('rv/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/styleRTL.css')}}" rel="stylesheet"> 
    <link href="{{asset('rv/css/login.css')}}" rel="stylesheet">

    <script src="{{ asset('js/take_scripts.js') }}" defer></script>
   
    
    <style>
       body{
            background: rgba(243,243,243,0.96);
            direction: rtl;
        }
        input{ direction: ltr;}
        label{ font-size: .8rem;}
        .link-login{font-size: .8rem;}
        
        .field-icon {
            float: right;
            margin-left: -25px;
            margin-top: -25px;
            position: relative;
            z-index: 2;
        }
        @media (max-width:576px) {
            .margin-b{
                margin: 3rem 0 ;}
            .link-login{
                font-size: .95rem;}
        }
    </style>
    <style>
        /* CSS comes here */
        #video {
            border: 1px solid black;
            width: 30rem;
            height: 22.4rem;
            
        }

        #photo {
            border: 1px solid black;
            width: 30rem;
            height: 22.4rem;
        }

        #canvas {
            display: none;
            
        }

        .camera {
            width: 30rem;
            height: 22.4rem;
            display: inline-block;
            /* marign-top:10% !important; */

        }

        .output {

            /*width: 340px;*/
            display: inline-block;
        }

        #startbutton {
            display: block;
            position: relative;
            
            bottom: 36px;
            padding: 5px;
           /* background-color: #6a67ce;
            border: 1px solid rgba(255, 255, 255, 0.7);*/
            font-size: 14px;
            /*color: rgba(255, 255, 255, 1.0);*/
            cursor: pointer;
        }

        .contentarea {
            font-size: 16px;
            font-family: Arial;
            text-align: center;

        }
        #take_pic{
            margin-right: 10rem!important;
        }
    </style>
    
    @stack('css')
</head>
<body>
    
            @yield('content')
        
        
<!-- <script src="{{ asset('rv/js/jquery3.3.1.js') }}"></script>
<script src="{{ asset('rv/js/bootstrap.min.js') }}"></script> -->

</body>
</html>
