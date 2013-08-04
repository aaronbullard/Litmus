@layout('mockup::layout')

@section('description')Litmus Mock App@endsection

@section('content')

	<div class="container">
		<h3>{{ $title }}</h3>
		<p class="lead">{{ $lead }}</p>
		
		{{ $tabs }}
		
		<div class="tab-content">
			
			<div class="tab-pane active" id="swatch">
				
				<p>
					Image:
					<img src="{{ $response->data->sample->url }}" />
				</p>
				
				<p>Sample: Average: r->{{$response->data->sample->color->red}},
							g->{{$response->data->sample->color->green}},
							b->{{$response->data->sample->color->blue}}
				</p>
				<p style="height:100px; width:100px; 
				   background-color: rgb({{$response->data->sample->color->red}},
										{{$response->data->sample->color->green}},
										{{$response->data->sample->color->blue}});">	
				</p>
				
				@if( isset($response->data->scale) )
					@foreach($response->data->scale as $scale)
						<p>Scale: r->{{$scale->color->red}}, g->{{$scale->color->green}}, b->{{$scale->color->blue}}</p>
						<p style="height:100px; width:100px; background-color: rgb({{$scale->color->red}}, {{$scale->color->green}}, {{$scale->color->blue}});"></p>
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