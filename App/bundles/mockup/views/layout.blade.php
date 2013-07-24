@layout('modelo::master')

	@section('title')
		{{Config::get('mockup::mockup.app_name')}}
	@endsection


	@section('description')Some description for the meta tag here@endsection


	@section('styles')
		{{Asset::container('bootstrapper')->styles()}}
		{{Asset::container('styles')->styles()}}
		<style>
			body {
			  padding-top: 60px;
			}
			@media (max-width: 979px) {
			  body {
			    padding-top: 0px;
			  }
			}
		</style>
	@endsection

	@section('header')
		@include('mockup::partials.navbar')
	@endsection



	@section('footer')
		<div class="well">
			<div class='container'>Beta Testing</div>
		</div>
	@endsection

	@section('page_scripts')
		{{Asset::container('bootstrapper')->scripts()}}
		{{Asset::container('scripts')->scripts()}}
	@endsection
