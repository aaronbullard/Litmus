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


@section('page_scripts')
	@parent
	<script>
		$('body').on('pagecreate', function(){
			$('table').attr('data-role', 'table')
					// .attr('data-mode', 'reflow')
					.addClass('table-stroke')
					.addClass('ui-responsive');	
		});
	</script>
@endsection