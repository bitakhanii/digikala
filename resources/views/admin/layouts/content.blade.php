@extends('layouts.master')

@section('content')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/adminLTE/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="/adminLTE/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="/adminLTE/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/adminLTE/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/adminLTE/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/adminLTE/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/adminLTE/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="/adminLTE/css/adminlte.min.css">
    <!-- bootstrap rtl -->
    <link rel="stylesheet" href="/adminLTE/css/bootstrap-rtl.min.css">
    <!-- template rtl version -->
    <link rel="stylesheet" href="/adminLTE/css/custom-style.css">

    <!-- jQuery -->
    {{--<script src="/adminLTE/jquery/jquery.min.js"></script>--}}
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="/adminLTE/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="/adminLTE/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="/adminLTE/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="/adminLTE/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="/adminLTE/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="/adminLTE/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="/adminLTE/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="/adminLTE/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="/adminLTE/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="/adminLTE/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/adminLTE/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/adminLTE/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="/adminLTE/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    {{--<script src="/adminLTE/js/demo.js"></script>--}}
    <!-- Select2 Plugin -->
    <script src="/adminLTE/select2/select2.full.js"></script>
    <link href="/adminLTE/select2/select2.css" rel="stylesheet">

    <style>

        #main {
            width: 100%;
            background-color: #fff;
            margin: 10px auto;
            box-shadow: 0 2px 3px rgba(0, 0, 0, .08);
            border-radius: 3px;
            overflow: hidden;
        }

        #main::after {
            content: "";
            display: block;
            clear: both;
        }

        #content {
            width: 75%;
            padding: 20px;
            float: right;
            border-radius: 3px;
            margin-right: 3%;
        }

        #content * {
            box-sizing: border-box !important;
        }

    </style>

    <div id="main">
        @include('admin.layouts.sidebar')

        <div id="content">
            {{ $slot }}
        </div>
    </div>

@endsection

@section('script')
    {{ $script ?? '' }}
@endsection

