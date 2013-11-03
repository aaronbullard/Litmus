@section('uploadform')
<div id="image-upload">
	{{ Form::open(array('action' => 'MockupController@post_store')) }}
		{{ Form::label('sample', "Sample Image") }}
		{{ Form::file('sample') }}
		{{ Form::label('control', "Control Image") }}
		{{ Form::file('control') }}
		{{ Form::label('scale_id', "Palettes") }}
		{{ Form::select('scale_id', Palette::lists('title', 'id') ) }}
		<div class="form-actions">
			<button class="btn-primary btn" type="submit">Submit</button>
			<button type="button" class="btn">Cancel</button>
		</div>
	{{ Form::close() }}
</div>
@show