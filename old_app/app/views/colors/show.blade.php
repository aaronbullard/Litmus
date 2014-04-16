@extends('layouts.scaffold')

@section('main')

<h1>Show Color</h1>

<p>{{ link_to_route('palettes.{palettes}.colors.index', 'Return to all colors', $color->palette->id) }}</p>

@include('colors.partials.table', ['colors' => [$color]])

@stop
