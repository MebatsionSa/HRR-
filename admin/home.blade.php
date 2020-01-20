@extends('layouts.hotel.hotel_header')
@inject('profile','App\Extension\Common')
@section('tittle')
    @parent
    Dashboard
@endsection
@section('content')
    <div id="wrapper">
        <!-- Sidebar -->
    @include('includes.admin.sidebar')
    <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
            @include('includes.admin.topbar')
            <!-- End of Topbar -->
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @section('main-content')

                    @show
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            @include('includes.admin.adminfooter')
        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    @include('includes.admin.log_out_modal')
    <!-- End Of Logout Modal-->
@endsection
