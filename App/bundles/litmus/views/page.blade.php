@layout('litmus::layout')

@section('description')@endsection

@section('content')

	<div class='container'>
		
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
		
		@include('litmus::partials.message')
		
		{{ $content}}
		
	</div>
	
@endsection

