@layout('modelo::master')

	@section('title')
		{{Config::get('litmus::config.app_name')}}
	@endsection


	@section('description')Some description for the meta tag here@endsection


	@section('styles')
		{{Asset::container('bootstrapper')->styles()}}
		{{Asset::container('bootstrapper')->scripts()}}
	@endsection

	@section('content')
		@include('litmus::partials.navbar')
	@endsection
