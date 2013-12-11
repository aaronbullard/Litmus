@section('form')
<div id="image-upload">
	{{ Form::open(array('action' => 'MockupMobileController@post_upload', 'files' => true, 'data-ajax'=>'false')) }}
		
		{{ Form::label('palette_id', "Palette") }}
		{{ Form::text('palette_id', Input::old('palette_id'), ['disabled' => 'true'] ) }}

		{{ Form::label('image', "Sample Image") }}
		<div style="display:none;" data-enhance="false">{{ Form::file('image') }}</div>
		<div data-role="button" id="chooseImage" data-theme="b" data-icon='info'>Choose Image</div>

		<fieldset class="ui-grid-a">
			<div class="ui-block-a"><button type="submit" data-theme="c">Cancel</button></div>
			<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>	   
		</fieldset>
	{{ Form::close() }}
</div>
@show

