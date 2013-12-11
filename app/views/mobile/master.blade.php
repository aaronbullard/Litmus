@extends('crlosmify.modelo.master')


@section('title')
	{{ Config::get('mockup.app_name') }}
@stop

@section('meta-tags')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
@stop


@section('styles')
	<!-- <link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile.structure-1.3.2.min.css" /> -->
	<link rel="stylesheet" href="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.css" />
	{{-- HTML::style('assets/lib/jqmobile/css/bootstrap.css') --}}
@stop

@section('page_styles')
@stop


@section('header')
@stop


@section('content')
	@yield('page')
@stop


@section('footer')
@stop

@section('page_scripts')
	{{ HTML::script('assets/lib/jquery-1.9.1/jquery-1.9.1.min.js') }}
	{{ HTML::script('assets/js/Litmus.js') }}
	<script src="http://code.jquery.com/mobile/1.3.2/jquery.mobile-1.3.2.min.js"></script>
@stop