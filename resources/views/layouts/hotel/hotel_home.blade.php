@extends('layouts.hotel.hotel_header')
@section('tittle')
 @parent
 Dashboard
@stop
@section('content')
<div id="wrapper">
    <!-- Sidebar -->
      @include('includes.hotel.sidebar')
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
         @include('includes.hotel.topbar')
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
           <div class="container-fluid">
           	  @yield('main-content')
           </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
       @include('includes.hotel.hotelfooter')
    </div>
    <!-- End of Content Wrapper -->

 </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
   @include('includes.hotel.logoutmodal')
  <!-- End Of Logout Modal-->
@endsection