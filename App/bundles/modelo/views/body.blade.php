@section('body')

  @section('header')
    {{-- Put header include here --}}
  @yield_section
  {{-- HEADER --}}

  {{-- CONTENT --}}
  <div id="content">
    @yield('content')    
  </div>
  {{-- CONTENT --}}

  @section('footer')
    {{-- Put footer include here --}}
  @yield_section
  {{-- FOOTER --}}
@yield_section