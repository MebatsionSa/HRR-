@extends('layouts.hotel.hotel_home')
@section('tittle')
@parent
@stop
@section('main-content')
@php
$hotel  = hotel_logged_in(); 
@endphp
@if(!($hotel->hotel_status))
    @alert(['type'=>'alert-success'])
      {{UN_APPROVED_MESSAGE }}
    @endalert
@else
@endif
@endsection