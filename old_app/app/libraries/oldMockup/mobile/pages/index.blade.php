@extends('mobile.page')

@section('page.id')
{{ isset($id) ? $id : Request::path(); }}
@stop

@section('page.content')
<div data-role="content">
	@if( isset($main) )
		{{ $main }}
	@else
		@yield('main')
	@endif
</div><!-- /content -->	
@stop