@extends('layouts.scaffold')

@section('main')

<h1>All Palettes</h1>

<p>{{ link_to_route('palettes.create', 'Add new palette') }}</p>

@if ($palettes->count())
	@include('palettes.partials.table')
@else
	There are no palettes
@endif

@stop
