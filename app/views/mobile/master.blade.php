@extends('crlosmify.modelo.master')

@include('mobile.themes.flat')

@section('title')
	{{ Config::get('mockup.app_name') }}
@stop

@section('meta-tags')
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
@stop


@section('styles')
	{{ HTML::style('assets/css/litmus.css') }}
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
@stop