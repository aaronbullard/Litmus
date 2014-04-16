@extends('mobile.master')

@include('mobile.partials.header')
@include('mobile.partials.left-panel')
@include('mobile.partials.right-panel')
@include('mobile.partials.footer')

@section('page')
<div data-role="page" id="@yield('page.id')">

	@yield('page.header')

	@yield('page.content')

	@yield('left-panel')
	@yield('right-panel')

	@yield('page.footer')

</div><!-- /page -->
@stop