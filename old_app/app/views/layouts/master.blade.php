@extends('custom-layout::master')

@section('title')
	{{ Config::get('mockup.app_name') }}
@stop

@section('meta-tags')
@stop


@section('styles')
@parent
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
	@include('layouts.partials.navbar')
	<div class='container'>
		@include('layouts.partials.messages')
		@yield('main')
	</div>
@stop


@section('footer')
	@include('layouts.partials.footer')
@stop


@section('page_scripts')
@stop