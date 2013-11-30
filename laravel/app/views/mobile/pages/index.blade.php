@extends('mobile.page')


@section('page.id')
{{ isset($id) ? $id : Request::path(); }}
@stop


@section('page.content')
<div data-role="content">
	@if(isset($content))
		{{ $content }}
	@else
		@yield('main')
	@endif
</div><!-- /content -->	
@stop