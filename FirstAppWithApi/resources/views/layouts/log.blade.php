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
    <meta name="description" content="Laravel messenger demo app by Richard Tippin. A full messenger suite for your new / existing laravel app! Private and group threads between multiple models, with real-time messaging, reactions, attachments, calling, chat bots, and more!">
    <meta name="keywords" content="laravel, demo, git, messenger, plugin, package, open, source, message, suite, php, javascript, bootstrap, framework, webrtc, tippin, jquery, MVC, ORM, OOP, discord, bots, calls, reactions" />
    <meta name="title" content="@yield('title', 'Video Rayan')">
    <title>@yield('title', 'Video Rayan')</title>
    <link  href="{{ asset('rv/img/favicon2.gif') }}" type="image/png" rel="icon">
    
    <link href="{{asset('rv/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('rv/css/styleRTL.css')}}" rel="stylesheet"> 
    <link href="{{asset('rv/css/login.css')}}" rel="stylesheet">
  
    
    
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

        .loading {
            position: absolute;
            display: none;
            top : 25%;
            right : 42%;
        }
    </style>
    <style>
        #video {
            border: 1px solid black;
            /*width: 320px;
            height: 240px;*/
            border-radius: 1rem;
            width: 25rem;
            height: 85% !important;
            position: relative;
            margin-top: 2rem;
        }

        #photo {
            border: 1px solid black;
             height: 85% !important;
            
        }
        #canvas {
            display: none;
            
        }
        .camera {
            width: 340px;
            display: inline-block;
        }
        .output {
             height: 85% !important;
            display: inline-block;
        }
        #startbutton {
            display: block;
            position: relative;
            margin-left: auto;
            margin-right: auto;
            bottom: 36px;
            padding: 5px;
            /*background-color: #6a67ce;*/
            /*border: 1px solid rgba(255, 255, 255, 0.7);*/
            font-size: 14px;
            /*color: rgba(255, 255, 255, 1.0);*/
            cursor: pointer;
        }
        .contentarea {
            font-size: 16px;
            font-family: Arial;
            text-align: center;
        }
        #take_pick_login{
            margin-left: 26.5rem;
        }
    </style>
    
    
</head>
<body>
    <div id="login_reg" class="container mt-5">
        <div class="col-md-6 col-sm-12 p-0 section-form-login " >
        
            @yield('content')
        
        </div>
       
<script src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"
  ></script>
<script src="{{ asset('rv/js/bootstrap.min.js') }}" defer></script>
<script src="{{ asset('js/face-api.min.js') }}" defer></script>
<script src="{{ asset('js/script.js') }}" defer></script>


</body>
</html>
