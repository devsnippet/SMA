@extends('layouts.master')
@include('home.slider')
@section('title')
    Home
@stop

@section('meta_description')
    This is a description
@stop

@section('content')
	@yield('slider')
    <div class="container" style="margin-top:15px;">
        <h1>Student Management Administration</h1>
        <p>
        Welcome to SMA - Student Management Administration.
        </p>
        <p>
        Please use "admin" as username and "password" as password for demo login.
        </p>
    </div>
@stop

@section('scripts')
	<script type="text/javascript">
		$(window).load(function(){
			$('.bxslider').bxSlider({
				autoStart:true,
				auto: true,
				speed:500,
				mode: 'fade',
  				captions: false,
			    pager: false
			});
		});
	</script>
@stop