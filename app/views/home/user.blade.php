@extends('layouts.master')
@include('home.slider')
@section('title')
    Home
@stop

@section('meta_description')
    This is a description
@stop

@section('content')
	<div ng-view></div>
@stop
