<!DOCTYPE html>
<html lang="en">
  <head>
    <meta
      name="description"
      content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."
    />
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image" />
    <meta property="twitter:site" content="@pratikborsadiya" />
    <meta property="twitter:creator" content="@pratikborsadiya" />
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Vali Admin" />
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme" />
    <meta
      property="og:url"
      content="http://pratikborsadiya.in/blog/vali-admin"
    />
    <meta property="og:image" content="../blog/vali-admin/hero-social.png" />
    <meta
      property="og:description"
      content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular."
    />
    <title>@yield('title') | Mianzi</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css')}}" />
    <!-- Font-icon css-->
    <link href="{{ asset('backend/plugins/fonts/css/all.css') }}" rel="stylesheet">
    <!-- date time ppicker -->
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/summernote/summernote-bs4.css') }}">
    <!-- for date picker -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/datetimepicker/css/tempusdominus-bootstrap-4.css')}}">

    @livewireStyles
  </head>

  <body class="app sidebar-mini rtl">
    <!-- Navbar-->
    @include('layouts.partials.admin.nav')
    <!-- Sweet alert -->
    @include('sweetalert::alert')

    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    @include('layouts.partials.admin.sidebar')
    <main class="app-content">
      @yield('breadcrub')
      @yield('content')
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="{{ asset('backend/js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('backend/js/popper.min.js') }}"></script>
    <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('backend/js/main.js') }}"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ asset('backend/js/plugins/pace.min.js') }}"></script>

    <!-- Data table plugin-->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/js/plugins/dataTables.bootstrap.min.js') }}"></script>
    <!-- Select 2 plugin -->
    <script type="text/javascript" src="{{ asset('backend/js/plugins/select2.min.js') }}"></script>
    
    <!-- Summernote -->
    <script src="{{ asset('backend/plugins/summernote/summernote-bs4.min.js') }}"></script>

    <!-- date time picker-->
    <script type="text/javascript" src="{{ asset('backend/plugins/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/backend/plugins/datetimepicker/js/tempusdominus-bootstrap-4.js')}}"></script>
<!-- DataTables -->

    @livewireScripts
    @yield('extra-script')
    <script type="text/javascript">

      $('#sampleTable').DataTable();
      $('#select2').select2();
    </script>
  <!-- date time picker-->
    <script type="text/javascript">
    $(function () {
        $('#datetimepicker7').datetimepicker();
        $('#datetimepicker8').datetimepicker({
            useCurrent: false
        });
        $("#datetimepicker7").on("change.datetimepicker", function (e) {
            $('#datetimepicker8').datetimepicker('minDate', e.date);
        });
        $("#datetimepicker8").on("change.datetimepicker", function (e) {
            $('#datetimepicker7').datetimepicker('maxDate', e.date);
        });
    });
</script>
<script>
  $(function () {
    // Summernote
    $('.textarea').summernote()
  })
</script>
  </body>
</html>
