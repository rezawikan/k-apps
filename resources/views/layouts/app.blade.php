<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INSPINIA - @yield('title') </title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App styles -->
    <link rel="stylesheet" href="{{ mix('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ mix('font-awesome/css/font-awesome.min.css') }}">

    <!-- Vendor styles -->
    {{-- <link rel="stylesheet" href="{{ mix('css/vendor.min.css') }}" /> --}}
    <link rel="stylesheet" href="{{ mix('css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ mix('css/style.min.css') }}">



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
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ mix('js/plugins/metisMenu/jquery.metisMenu.min.js') }}"></script>
    <script src="{{ mix('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ mix('js/inspinia.min.js') }}"></script>
    <script src="{{ mix('js/plugins/pace/pace.min.js') }}"></script>
    {{-- <script src="{{ mix('js/vendor.min.js') }}"></script> --}}

    <!-- Custom -->
    @stack('b-scripts')

</body>
</html>
