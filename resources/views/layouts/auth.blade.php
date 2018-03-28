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

        <title>{{ config('app.name') }} @yield('title')</title>

        <!-- App styles -->
        <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ mix('font-awesome/css/font-awesome.min.css') }}">

        <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}">
        <link rel="stylesheet" href="{{ mix('css/style.min.css') }}">

    </head>

    <body class="gray-bg">
      <div id="app">

        @yield('content')

      </div>

        <!-- Javascript -->
        <script src="{{ mix('js/app.js') }}"></script>
</body>
</html>
