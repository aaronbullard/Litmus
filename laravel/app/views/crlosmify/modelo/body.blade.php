@section('body')

  @section('header')
    {{-- @include('common.header') --}}
  @show
  {{-- HEADER --}}

  {{-- CONTENT --}}
  <div id="content">
    @yield('content')    
  </div>
  {{-- CONTENT --}}

  @section('footer')
    {{-- @include('common.footer') --
  @show
  {{-- FOOTER --}}
@show