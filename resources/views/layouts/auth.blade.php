<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from byrushan.com/projects/material-app/2.0/jquery/bs4/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Jan 2018 02:01:56 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Icon -->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/k-icon.png') }}">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="og:title" content="{{ config('app.name') }}"/>
        <meta name="og:description" content="Internal System of Kopernik"/>
        <meta name="author" content="Mochammad Rezza Wikandito, reza.wikan.dito@gmail.com">
        <meta name="owner" content="Kopernik (NGO)">
        <link rel='fluid-icon' type='image/png' href='https://intranet.kopernik.info/img/k-icon.png'>

        <title>{{ config('app.name') }}</title>

        <!-- App styles -->
        <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ mix('font-awesome/css/font-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.min.css') }}">

    </head>

    <body class="gray-bg" style="background-image: url({{ URL::asset('css/patterns/shattered.png') }});margin-top: 8%;">
      <div id="app">

        @yield('content')

      </div>

        <!-- Javascript -->
        <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
