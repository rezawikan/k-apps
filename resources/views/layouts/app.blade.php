<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopernik - @yield('title') </title>

    <!-- Icon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('img/k-icon.png') }}">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="og:title" content="{{ config('app.name') }}"/>
    <meta name="og:description" content="Internal System of Kopernik"/>
    <meta name="author" content="Mochammad Rezza Wikandito, reza.wikan.dito@gmail.com">
    <meta name="owner" content="Kopernik (NGO)">
    <link rel='fluid-icon' type='image/png' href='https://intranet.kopernik.info/img/k-icon.png'>

    <!-- App styles -->
    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ mix('font-awesome/css/font-awesome.min.css') }}">

    <!-- Vendor styles -->
    <link rel="stylesheet" href="{{ mix('css/footable.min.css') }}" />
    <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/chosen.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/datepicker3.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/jasny-bootstrap.min.css') }}">

    @stack('t-scripts')

</head>
<body>
  <div id="app">

    <!-- Wrapper-->
      <div id="wrapper">

          <!-- Navigation -->
          @include('layouts.navigation')

          <!-- Page wraper -->
          <div id="page-wrapper" class="gray-bg">

              <!-- Page wrapper -->
              @include('layouts.topnavbar')

              <!-- Main view  -->
              @yield('content')

              <!-- Footer -->
              @include('layouts.footer')

          </div>
          <!-- End page wrapper-->

      </div>
      <!-- End wrapper-->

  </div>

    <!-- Mainly scripts -->
    <script src="{{ mix('js/jquery-2.1.1.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/plugins/metisMenu/jquery.metisMenu.min.js') }}"></script>
    <script src="{{ mix('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ mix('js/plugins/easypiechart/jquery.easypiechart.js') }}"></script>

    <!-- FooTable -->
    <script src="{{ mix('js/plugins/footable/footable.all.min.js') }}"></script>

    <!-- FooTable -->
    <script src="{{ mix('js/plugins/chosen/chosen.all.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ mix('js/inspinia.min.js') }}"></script>
    <script src="{{ mix('js/plugins/pace/pace.min.js') }}"></script>
    <script src="{{ mix('js/plugins/datapicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ mix('js/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ mix('js/plugins/jasny/jasny-bootstrap.min.js') }}"></script>

    <!-- Custom -->
    @stack('b-scripts')

</body>
</html>
