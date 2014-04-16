@extends('layouts.scaffold')

@section('main')

<h1>All Accounts</h1>

<p>{{ link_to_route('accounts.create', 'Add new account') }}</p>

@if ($accounts->count())
	@include('accounts.partials.table')
@else
	There are no accounts
@endif

@stop
