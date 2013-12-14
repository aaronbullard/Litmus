@section('styles')
	@parent
	{{ HTML::style('assets/lib/jqmobile/flat/demo/css/jquery.mobile.flatui.css') }}
@stop


@section('page_scripts')
	@parent
	{{ HTML::script('assets/lib/jqmobile/flat/demo/js/jquery.mobile-1.4.0-rc.1.js') }}
@stop