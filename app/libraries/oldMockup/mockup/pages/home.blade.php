@extends('layouts.master')

@section('description')
	Litmus Mock App
@stop

@section('main')
<div class="container">
	<h3>{{ $title }}</h3>
	<p class="lead">{{ $lead }}</p>

	{{ $content }}

</div>
@stop