<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}" />

  <title>Twinning Project | Makara.Az</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="{{asset("adminassets/bootstrap/css/bootstrap.min.css")}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset("adminassets/dist/css/font-awesome.min.css")}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset("adminassets/dist/css/ionicons.min.css")}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset("adminassets/dist/css/AdminLTE.min.css")}}">

  <link rel="stylesheet" href="{{asset("adminassets/dist/css/skins/skin-blue.min.css")}}">

  <link rel="stylesheet" href="{{asset("adminassets/plugins/datepicker/datepicker3.css") }}">

  <!--[if lt IE 9]>
  <script src="{{asset('assets/js/html5shiv.min.js')}}"></script>
  <script src="{{asset('assets/js/respond.min.js')}}"></script>
  <![endif]-->


<!-- jQuery 2.2.0 -->
<script src="{{ asset("adminassets/plugins/jQuery/jQuery-2.2.0.min.js") }}"></script>
<script src="{{ asset("adminassets/plugins/datepicker/bootstrap-datepicker.js") }}"></script>


</head>
<body class="hold-transition skin-blue sidebar-mini">


	<div class="wrapper">

    @include('adminpanel.includes.header')

    @include('adminpanel.includes.leftsidebar')



    @yield('body')


    @include('adminpanel.includes.footer')
    
    

  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->



<!-- REQUIRED JS SCRIPTS -->

<!-- Bootstrap 3.3.6 -->
<script src="{{asset("adminassets/bootstrap/js/bootstrap.min.js")}}"></script>
<!-- AdminLTE App -->
<script src="{{asset("adminassets/dist/js/app.min.js")}}"></script>

<script src="{{ asset("adminassets/plugins/datatables/jquery.dataTables.min.js") }}"></script>

<script src="{{ asset("adminassets/plugins/datatables/dataTables.bootstrap.min.js") }}"></script>
<!-- SlimScroll -->
<script src="{{ asset("adminassets/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
<!-- FastClick -->
<script src="{{ asset("adminassets/plugins/fastclick/fastclick.js") }}"></script>

</body>
</html>