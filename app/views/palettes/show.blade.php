@extends('layouts.scaffold')

@section('main')

<h1>Show Palette</h1>

<p>{{ link_to_route('palettes.index', 'Return to all palettes') }}</p>

@include('palettes.partials.table', ['palettes' => [$palette]])

@stop
