@layout('mockup::layout')

@section('description')Litmus Mock App@endsection

@section('content')

	<div class="container">
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
		
		{{ $tabs }}
		
		<div class="tab-content">
			
			<div class="tab-pane active" id="swatch">
				
				<div class="well well-small">
					<p>Image:</p>
					<p id="pCanvas">
						<canvas id="myCanvas" >
							<text>Scroll over this.  If nothing happens, your browser does not support HTML5.</text>
						</canvas>
						<img id="image_actual" class="hide" src="{{ $response->data->sample->url }}" />
						<input id="image_url" type="hidden" name="image" value="{{ $response->data->sample->url }}" />
					</p>
				</div>
				
				<div class="well well-small row">
					<div class="span3">
						<p>Sample:</p>
						<p style="height:150px; width:150px; padding:10px; border-radius: 5px;
						   background-color: rgb({{$response->data->sample->color->red}},
												{{$response->data->sample->color->green}},
												{{$response->data->sample->color->blue}});">
							<text>Color: ({{$response->data->sample->color->red}},
												{{$response->data->sample->color->green}},
												{{$response->data->sample->color->blue}})
							</text>
						</p>
					</div>
					<div class="span3">
						@if( isset($response->data->control) )
						<p>Control:</p>
						<p style="height:150px; width:150px; padding:10px; border-radius: 5px;
						   background-color: rgb({{$response->data->control->color->red}},
												{{$response->data->control->color->green}},
												{{$response->data->control->color->blue}});">
							<text>Color: ({{$response->data->control->color->red}},
												{{$response->data->control->color->green}},
												{{$response->data->control->color->blue}})
							</text><br>
							<text>Magnitude: {{ round($response->data->control->magnitude) }}</text><br>
							<text>Normalized: {{ round($response->data->control->normalized,3) * 100 }}%</text>
						</p>
						@endif
					</div>
				</div>

				@if( isset($response->data->scale) )
					@foreach($response->data->scale as $scale)
					<div class="well well-small">
						<p style="height:150px; width:150px; padding:10px; border-radius: 5px;
						   background-color: rgb({{$scale->color->red}}, 
												{{$scale->color->green}},
												{{$scale->color->blue}});">
							<text>Name: {{ $scale->color->name }}</text><br>
							<text>Color: ({{$scale->color->red}}, {{$scale->color->green}}, {{$scale->color->blue}})</text><br>
							<text>Magnitude: {{ round($scale->magnitude) }}</text><br>
							<text>Normalized: {{ round($scale->normalized,3) * 100 }}%</text>
						</p>
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

@endsection