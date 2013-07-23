@layout('litmus::layout')

@section('description')Litmus API Response@endsection

@section('content')

	<div class="container">
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
	</div>
	

	{{ $code }}

@endsection