@extends('layouts.master')

@section('description')
Litmus Mock App
@stop

@section('page_scripts')
	{{ HTML::script('assets/lib/jcrop-master/js/jquery.Jcrop.js') }}
	<script>
		jQuery(function($){
			// How easy is this??
			$('#target').Jcrop();
		});
	</script>
@stop

@section('page_styles')
	{{ HTML::style('assets/lib/jcrop-master/css/jquery.Jcrop.css') }}
@stop

@section('main')
<div class="container">
	<h3>{{ $title }}</h3>
	<p class="lead">{{ $lead }}</p>
	<img src="{{ $image_url }}" id="#target" />

@show