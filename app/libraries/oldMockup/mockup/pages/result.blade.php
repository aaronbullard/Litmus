@extends('layouts.master')

@include('mockup.partials.tabs')
@include('mockup.partials.navbar')

@section('description')
	Litmus Mock App
@stop


@section('page_scripts')
	@parent
	{{ HTML::script('assets/lib/jcrop-master/js/jquery.Jcrop.js') }}
	{{ HTML::script('assets/js/colorbox.js') }}
	{{ HTML::script('assets/js/jcrop.js') }}
@stop


@section('page_styles')
	@parent
	{{ HTML::style('assets/lib/jcrop-master/css/jquery.Jcrop.css') }}
	{{ HTML::style('assets/css/jcrop-preview.css') }}
@stop


@section('main')
<div class="container">
	<h3>{{ $title }}</h3>
	<p class="lead">{{ $lead }}</p>
	
	@yield('tabs')
	
	<div class="tab-content">
		
		<div class="tab-pane active" id="swatch">
			
			<div class="well well-small">
				<p>Image:</p>
				<p id="pCanvas">
					<div class="row">
						<div class="span5">
							<canvas id="myCanvas" >
								<text>Scroll over this.  If nothing happens, your browser does not support HTML5.</text>
							</canvas> 
							<img id="image_actual" class="hide" src="{{ $response->data->sample->url }}" />
							<input id="image_url" type="hidden" name="image" value="{{ $response->data->sample->url }}" />
						</div>
						<div class="span5" id="preview-pane">
							<div class="preview-container">
								<img src="{{ $response->data->sample->url }}" class="jcrop-preview" alt="Preview" />
							</div>
						</div>
					</div>
				</p>
				<!-- <a class="btn btn-primary" href="{{ url('colormatch/image/sample.jpg') }}">Crop</a> -->
			</div>
			
			<div class="well well-small row">
				
				<div class="span3">
					<p>Sample:</p>
					{{ View::make('mockup.partials.swatch')->with('obj', $response->data->sample) }}
				</div>

				@if( isset($response->data->control) )
				<div class="span3">
					<p>Control:</p>
					{{ View::make('mockup.partials.swatch')->with('obj', $response->data->control) }}
				</div>
				@endif

				@if( isset($response->data->ambient) )
				<div class="span3">
					<p>Ambient:</p>
					{{ View::make('mockup.partials.swatch')->with('obj', $response->data->ambient) }}
				</div>
				@endif

			</div>	

			@if( isset($response->data->scale) )
				@foreach($response->data->scale as $scale)
				<div class="well well-small">
					{{ View::make('mockup.partials.swatch')->with('obj', $scale) }}
				</div>
				@endforeach
			@endif

		</div>
		
		<div class="tab-pane" id="code">
			<pre>
			  <code>{{ $code }}</code>
			</pre>
		</div>
	</div>
</div>
@stop