@section('logo.image')
{{ HTML::image('assets/img/3d_cube_icon.svg', "Litmus, LLC", array('style' => 'width:18px; padding-bottom:5px')) }}
@stop

@section('logo.tagline')
<div>
	@yield('logo.image') Powered by LitmusAPI<sup>TM</sup>
</div>
@stop