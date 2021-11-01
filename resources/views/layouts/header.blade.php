<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

        <link type="text/css" rel="icon" href="{{asset('Images/logo2.png')}}" type="image/x-icon">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="assets/css/fontawesome.css">
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="assets/css/templatemo-style.css">
        <link rel="stylesheet" href="{{asset('css/sidebar.css') }}">

        <!-- Styles -->
        <link rel="stylesheet" href="{{URL::asset('fontawesome-free/css/all.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('fontawesome-free/css/fontawesome.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('fontawesome-free/css/v4-shims.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/normalize.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css') }}">
        <link rel="stylesheet" href="{{asset('css/pro.css') }}">

</head>
<body class="is-preload">
