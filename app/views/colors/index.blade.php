@extends('layouts.scaffold')

@section('main')

<h1>All Colors</h1>

<p>{{ link_to_route('palettes.{palettes}.colors.create', 'Add new color', $palette->id) }}</p>

@if ($palette->colors->count())
	@include('colors.partials.table', ['colors' => $palette->colors])
@else
	There are no colors
@endif

@stop
