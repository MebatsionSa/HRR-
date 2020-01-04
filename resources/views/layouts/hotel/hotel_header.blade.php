<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>@section('tittle') Hotel- @show</title>s
  <!-- Custom fonts for this template-->
  <link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="{{asset('js/date/daterangepicker.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.css" integrity="sha256-AghQEDQh6JXTN1iI/BatwbIHpJRKQcg2lay7DE5U/RQ=" crossorigin="anonymous" />

</head>
<body id="page-top" class="@if(Route::currentRouteName() == 'Hotels.LogInPage' || Route::currentRouteName() =='Hotels.ShowRegistrationForm')  bg-secondary @endif">
  <div>
     @yield('content');
  </div>

  <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/vue/dist/vue.js')}}"></script>
  <script type="text/javascript" src="{{asset('js/axios/dist/axios.js')}}"></script>
  <!-- Core plugin JavaScript-->
  <script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>
  <script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

  <!-- Custom scripts for all pages-->

  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js" integrity="sha256-JIBDRWRB0n67sjMusTy4xZ9L09V8BINF0nd/UUUOi48=" crossorigin="anonymous"></script>

  <!-- Page level plugins -->
   <script src="{{asset('assets/vendor/chart.js/Chart.min.js')}}"></script>

  <!-- Page level custom scripts -->
   <script src="{{asset('assets/js/demo/chart-area-demo.js')}}"></script>
  <script src="{{asset('assets/js/demo/chart-pie-demo.js')}}"></script>
</body>
