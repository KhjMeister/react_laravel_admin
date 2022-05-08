<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- css stable -->
    <!-- <link rel="stylesheet" href="{{ asset('client/assets/css/font.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/global.css') }}">
    <link rel="stylesheet" href="{{ asset('client/assets/css/kjstyles.css') }}">
    <!-- css stable  -->
    <link rel="stylesheet" href="{{ asset('client/assets/css/login.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ورود به ویدئو رایان') }}</title>


</head>
<body>


    @yield('content')    
  
   
</body>
</html>
