<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}">
    <!-- Font-icon css-->
    <!-- Font-icon css-->
    <link href="{{ asset('backend/fonts/css/all.css') }}" rel="stylesheet">
    <title>@yield('title') : Mianzi</title>
  </head>
  <body>
    <section class="material-half-bg">
      <div class="cover"></div>
    </section>
    @yield('content')
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}}"></script>
    <script src="{{ asset('backend/js/main.js') }}}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}}"></script>
  </body>
</html>