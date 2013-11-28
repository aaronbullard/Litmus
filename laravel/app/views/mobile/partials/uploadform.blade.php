@section('uploadform')
<div id="image-upload">
	{{ Form::open(array('action' => 'MockupMobileController@post_image', 'files' => true)) }}
		{{ Form::label('subject', "Sample Image") }}
		{{ Form::file('subject') }}
		{{ Form::label('palette_id', "Palettes") }}
		{{ Form::select('palette_id', Palette::lists('title', 'id') ) }}
		<div class="form-actions">
			<button class="btn-primary btn" type="submit">Submit</button>
			<button type="button" class="btn">Cancel</button>
		</div>
	{{ Form::close() }}
</div>
@show