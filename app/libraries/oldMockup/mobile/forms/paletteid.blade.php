@section('form')
<div>
	{{ Form::open(array('action' => 'MockupMobileController@get_paletteid', 'data-ajax'=>'true')) }}

	{{ Form::label('palette_id', "Enter the test strips code:") }}
	{{ Form::text('palette_id', Input::old('palette_id'), array('type' => 'number')) }}

	{{ Form::submit('Next', array('data-transition' => 'slide')) }}
	{{ Form::close() }}
</div>
@show