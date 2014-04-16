@extends('layouts.scaffold')

@section('main')
	<h1>Show Account</h1>
	<p>{{ link_to_route('accounts.index', 'Return to all accounts') }}</p>
	@include('accounts.partials.table', ['accounts' => [$account]])
@stop
