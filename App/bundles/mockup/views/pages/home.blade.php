@layout('mockup::layout')

@section('description')Litmus Mock App@endsection

@section('content')

	<div class="container">
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
		
		{{ $content }}

	</div>

@endsection