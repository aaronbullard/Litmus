@extends('mobile.master')

@include('mobile.partials.header')
@include('mobile.partials.left-panel')
@include('mobile.partials.right-panel')
@include('mobile.partials.footer')

@section('page')
<div data-role="page" id="splash" data-transition="slidedown">
	@yield('page.header')
	<div data-role="content" style="text-align:center;">
		{{ HTML::image('assets/img/3d_cube_icon.svg', "Litmus API, LLC", array('style' => 'width:80%;')); }}
	</div>
	@yield('left-panel')
	@yield('right-panel')
	@yield('page.footer')
</div><!-- /page -->
@parent
@stop


@section('page')
<div data-role="page" id="paletteId">
	@yield('page.header')
	<div data-role="content">
		{{ Form::label('pid', "Enter the test strips code:") }}
		{{ Form::text('pid', Input::old('pid'), array('type' => 'number', 'id'=>'pid')) }}
		<a href="#subject" data-role="button" data-theme="b">Next</a>
	</div>
	@yield('left-panel')
	@yield('right-panel')
	@yield('page.footer')
</div><!-- /page -->
@parent
@stop


@section('page')
<div data-role="page" id="subject">
	@yield('page.header')
	<div data-role="content">
		{{ Form::open(array('action' => 'MockupMobileController@post_upload', 'files' => true, 'data-ajax'=>'false')) }}			
			<p>Palette: <span id="paletteValue"></span></p>
			{{ Form::hidden('palette_id', Input::old('palette_id')) }}
			<div style="display:none;" data-enhance="false">{{ Form::file('image') }}</div>
			<p>Take a photo of the control color:</p>
			<div data-role="button" id="chooseImage" data-theme="b" data-icon='info'>Choose Image</div>
			<fieldset class="ui-grid-a">
				<div class="ui-block-a"><a data-role="button" data-transition="slidedown" href="#splash" data-theme="c">Cancel</a></div>
				<div class="ui-block-b"><button type="submit" data-theme="b">Submit</button></div>	   
			</fieldset>
		{{ Form::close() }}
	</div>
	@yield('left-panel')
	@yield('right-panel')
	@yield('page.footer')
</div><!-- /page -->
@stop