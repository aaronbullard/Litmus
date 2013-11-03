@extends('crlosmify.modelo.master')


@section('title')
	{{ Config::get('mockup.app_name') }}
@stop

@section('meta-tags')
@stop


@section('styles')
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{ HTML::style('assets/lib/bootstrap/css/styles/flatly.min.css') }}
	{{ HTML::style('assets/lib/bootstrap/css/bootstrap-responsive.min.css') }}
	
	<style>
		table form { margin-bottom: 0; }
		form ul { margin-left: 0; list-style: none; }
		.error { color: red; font-style: italic; }
		#content { margin-top:60px; }
	</style>
@stop

@section('page_styles')
@stop


@section('header')
	@yield('navbar')
@stop


@section('content')
	<div class='container'>
		@include('layouts.partials.messages')
		@yield('main')
	</div>
@stop


@section('footer')
@stop


@section('page_scripts')
	{{ HTML::script('assets/lib/bootstrap/js/bootstrap.min.js') }}
@stop