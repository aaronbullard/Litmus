@layout('litmus::layout')

@section('description')Litmus Main Page@endsection

@section('content')

	<div class="well">
		{{ Form::open() }}
			<input type="text" name="photo" value="my Photo" />
		{{ Form::close() }}
	</div>

	<div>
		<img src="{{url('bundles/litmus/img/PH_scale.jpg')}}" />
	</div>

@endsection

