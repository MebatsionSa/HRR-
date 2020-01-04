@extends('layouts.hotel.hotel_header')
@inject('profile','App\Extension\Common')
@section('tittle')
 @parent
 Dashboard
@endsection
@section('content')
<div id="wrapper">
    <!-- Sidebar -->
      @include('includes.users.sidebar')
    <!-- End of Sidebar -->
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
      <!-- Main Content -->
      <div id="content">
        <!-- Topbar -->
         @include('includes.users.topbar')
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
           <div class="container-fluid">
           	  @section('main-content')
                @if(isset($hotels))
                  <div class="row">
                    @foreach($hotels as $hotel)
                      <div class="col-md-4">
                         <div class="card">
                            <div class="card-header">
                               {{$hotel->hotel_name}}
                            </div>

                            <div class="card-img-top justify-content-center">
                               
                               <a >
                                 <img src="{{asset($profile->profilePicture('Hotel',$hotel->id))}}">
                               </a>
                            </div>
                            <div class="card-body">
                               <p class="card-text ">City:<b>{{$hotel->hotel_city}}</b></p>
                               <p class="card-text">Phone:<b>{{$hotel->hotel_phone_number}}</b></p>
                            </div>

                            <div class="card-footer">
                               <a href="{{route('Hotels.Index',['id' => $hotel->id])}}" class="btn btn-primary btn-block btn-outline-success">Detail</a>
                            </div>
                         </div>
                      </div>
                    @endforeach
                  </div>
                <div class="justify-content-center">{{$hotels->links()}}</div> 
                @else
                 No Available Hotels
                @endif
              @show
           </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
       @include('includes.users.user_footer')
    </div>
    <!-- End of Content Wrapper -->

 </div>
  <!-- End of Page Wrapper -->
  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>
  <!-- Logout Modal-->
   @include('includes.users.log_out_modal')
  <!-- End Of Logout Modal-->
@endsection