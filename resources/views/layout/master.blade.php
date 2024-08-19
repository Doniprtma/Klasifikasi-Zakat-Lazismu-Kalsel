<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('T4/assets/images/umbjm.png')}}" type="image/png" />
    <!--plugins-->
    <link href="{{asset('T4/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
   <!--  <link href="{{asset('T4/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" /> -->
    <link href="{{asset('T4/assets/plugins/highcharts/css/highcharts.css')}}" rel="stylesheet" />
    <link href="{{asset('T4/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
    <link href="{{asset('T4/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet" />
    <!-- loader-->
    <link href="{{asset('T4/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('T4/assets/js/pace.min.js')}}"></script>
    <!-- Bootstrap CSS -->
    <link href="{{asset('T4/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('T4/assets/css/bootstrap-extended.css')}}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link href="{{asset('T4/assets/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('T4/assets/css/icons.css')}}" rel="stylesheet">
    <!-- Theme Style CSS -->
    <link rel="stylesheet" href="{{asset('T4/assets/css/dark-theme.css')}}" />
    <link rel="stylesheet" href="{{asset('T4/assets/css/semi-dark.css')}}" />
    <link rel="stylesheet" href="{{asset('T4/assets/css/header-colors.css')}}" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Lazismu</title>
    <style type="text/css">
        /*.user-box {
            margin-left: 46rem !important;
        }*/

        /*.user-box {
            margin-left: 46rem !important;
        }*/
      

        .sidebar-wrapper .metismenu a:hover,
        .sidebar-wrapper .metismenu a:focus,
        .sidebar-wrapper .metismenu a:active,
        .sidebar-wrapper .metismenu .mm-active>a {
            color: #000;
            background: orange;
        }

        a {
            color: #0d6efd;
        }

        .text-primary {
            color: orange !important;
        }

        .border-primary {
            border-color: orange !important;
        }

        .btn-primary {
            color: #fff !important;
            background: orange !important;
            border-color: orange !important;
        }

        .back-to-top {
            background: #ffffa4;
        }

        .pace .pace-progress {
            background: yellow !important;
        }

        .toggle-icon {
            color: orange !important;
        }

        .user-img {
          border:2px solid orange !important;
        }
    </style>
    @section('css')
    @show
</head>

<body>
    <!--wrapper-->
    <div class="wrapper">
        <!--Sidebar-->
        @include('template.sidebar')
        <!--Header -->
        @include('template.header')
        <!--end header -->
        <!--start page wrapper -->
        @yield('content')
        <!--end page wrapper -->
        <!--start overlay-->
        <div class="search-overlay"></div>
        <div class="overlay toggle-icon"></div>
        <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        @include('template.footer')
    </div>
    <!--start switcher-->
  <!--   @include('template.style') -->
    <!--end switcher-->
    <!-- Bootstrap JS -->
    <script src="{{asset('T4/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!--plugins-->
    <script src="{{asset('T4/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
   <!--  <script src="{{asset('T4/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script> -->
    <script src="{{asset('T4/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
   <script src="{{asset('T4/assets/plugins/highcharts/js/highcharts.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/highcharts/js/exporting.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/highcharts/js/variable-pie.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/highcharts/js/export-data.js')}}"></script>
    <script src="{{asset('T4/assets/plugins/highcharts/js/accessibility.js')}}"></script>
<!-- 
    <script src="{{asset('T4/assets/js/index.js')}}"></script> -->
    <!--app JS-->
    <script src="{{asset('T4/assets/js/app.js')}}"></script>

    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/0.9.0/jquery.mask.min.js" integrity="sha512-oJCa6FS2+zO3EitUSj+xeiEN9UTr+AjqlBZO58OPadb2RfqwxHpjTU8ckIC8F4nKvom7iru2s8Jwdo+Z8zm0Vg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script>
              $(function () {
                $('#example2').DataTable({
                  "paging": true,
                  "lengthChange": true,
                  "searching": true,
                  "ordering": true,
                  "info": true,
                  "pageLength": 10,
                  "autoWidth": true,
                });
              });

              $('.uang').mask('0.000.000.000', {reverse: true});

            </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/js/all.min.js" integrity="sha512-GWzVrcGlo0TxTRvz9ttioyYJ+Wwk9Ck0G81D+eO63BaqHaJ3YZX9wuqjwgfcV/MrB2PhaVX9DkYVhbFpStnqpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@section('js')
    @show

</body>

</html>