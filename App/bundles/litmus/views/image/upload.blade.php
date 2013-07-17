@layout('litmus::layout')

@section('description')Litmus Image Upload@endsection

@section('content')

	<div class="container">
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
	</div>
	

	{{ $form }}

@endsection

