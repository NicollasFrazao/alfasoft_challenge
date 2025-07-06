<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta http-equiv="Content-Language" content="pt-br">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <title>{{ config('app.name') }}</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">

        <!-- Google Font: Source Sans Pro -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        
        <!-- Font Awesome Icons -->
        <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
        
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        
        <!-- Theme style -->
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        
        <!-- Bootstrap v3.3.7 -->
        <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">

        <!-- DataTables CSS -->
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <style>
            .card-title
            {
                margin-bottom: unset;
            }

            .dark-mode .card .dataTables_filter, 
            .dark-mode .card .dataTables_info,
            .dark-mode .card .paginate_button.previous,
            .dark-mode .card .paginate_button.next,
            .dark-mode .card .paginate_button.previous:hover,
            .dark-mode .card .paginate_button.next:hover,
            .dark-mode .card .paginate_button.current,
            .dark-mode .card .paginate_button
            {
                color: white !important;
            }

            .dark-mode .card .dt-button,
            .dark-mode .card .paginate_button.current,
            .dark-mode .card .paginate_button
            {
                background-color: transparent;
                border: 1px solid transparent;
                border-radius: 0.25rem;
                color: #212529;
                cursor: pointer;
                display: inline-block;
                font-size: .9rem;
                font-weight: 400;
                line-height: 1.6;
                padding: 0.375rem 0.75rem;
                text-align: center;
                text-decoration: none;
                transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                vertical-align: middle;

                background-image: unset;
                background-color: #3a4047 !important;
                color: #fff;
                border-color: #6c757d;
            }

            .dark-mode .card .paginate_button:not(.current)
            {
                border: unset;
            }

            .dark-mode .card .paginate_button:not(.current):hover
            {
                background: unset;
                background: linear-gradient(to bottom, #fff 0%, #dcdcdc 100%);
                color: black !important;
            }

            .dark-mode .card .dt-button:hover
            {
                color: black;
            }

            .dark-mode .card .dataTable
            {
                display: inline-table;
                margin-top: 10px !important;
            }

            .dark-mode .card .dataTable thead
            {
                background-color: #3a4047;
            }

            .dark-mode .card .dataTable tbody > tr
            {
                color: black;
            }

            .dark-mode .card .dataTable tbody > tr:nth-of-type(odd) 
            {
                background-color: #ffffff;
            }

            .dark-mode .card .dataTable tbody > tr > td,
            .dark-mode .card .dataTable thead > tr > th
            {
                vertical-align: middle;
                border: 1px solid #ececec;
            }
        </style>

        @stack('css')
    </head>

    <body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
        <div class="wrapper">
            <!-- Preloader -->
            <div class="preloader flex-column justify-content-center align-items-center">
                <img class="animation__wobble" src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
            </div>
            
            <!-- Navbar -->
            @include('layouts.navbar')
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            @include('layouts.sidebar')

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">
                    <div class="container-fluid">
                        @yield('content-header')
                    </div><!-- /.container-fluid -->
                </div>
                <!-- /.content-header -->
                
                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        {{--
                        @include('flash::message')
                        --}}
                        
                        <div class="row">
                            <div class="col-sm-12">
                                @yield('content')
                            </div>
                        </div>
                    </div><!--/. container-fluid -->
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->

            <!-- Main Footer -->
            <footer class="main-footer">
                <strong>Copyright &copy; 2014-2021 <a href="#" target="_blank">{{ config('app.name') }}</a>.</strong> All rights reserved.
                <div class="float-right d-none d-sm-inline-block"><b>Version</b> 1.0.0</div>
            </footer>
        </div>
        <!-- ./wrapper -->       
    </body>

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>

    <!-- DataTables -->
    <script src="//cdn.datatables.net/1.10.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="{{ mix('js/app.js') }}"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>
    
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <!-- PAGE PLUGINS -->
    
    <!-- jQuery Mapael -->
    <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

    <!-- Masks -->
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>
    <script>
        $(document).ready(function()
        {
            $('.date').mask('11/11/1111');
            $('.time').mask('00:00:00');
            $('.date_time').mask('00/00/0000 00:00:00');
            $('.cep').mask('00000-000');
            $('.phone').mask('0000-0000');
            $('.phone_with_ddd').mask('(00) 0000-0000');
            $('.phone_us').mask('(000) 000-0000');
            $('.mixed').mask('AAA 000-S0S');
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.money').mask('000.000.000.000.000,00', {reverse: true});
        });
    </script>

    @stack('scripts')
</html>