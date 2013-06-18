@section('head')

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title>@yield('title')</title>
  <meta name="description" content="@yield('description')">
  <meta name="author" content="{{Config::get('modelo::author')}}">

  {{-- In case you want to add your own meta tags --}}
  @yield('meta-tags')

  {{-- Mobile viewport optimized: j.mp/bplateviewport --}}
  <!-- <meta name="viewport" content="width=device-width,initial-scale=1"> -->
  <meta name="viewport" content="width=device-width">

  {{-- Mobile IE allows us to activate ClearType technology for smoothing fonts for easy reading --}}
  <meta http-equiv="cleartype" content="on">

  {{-- Don't forget your favicons! Place them in your root directory --}}
  <link rel="shortcut icon" href="/favicon.ico">

  {{-- Direct search spiders to the sitemap and the author's information --}}
  <link rel="sitemap" type="application/xml" title="Sitemap" href="/sitemap.xml">
  <link rel="author" title="Author" href="humans.txt">

  {{-- ===== CSS ===== --}}
  @section('styles')

  @yield_section

  {{-- Page stylesheet --}}
  @yield('page_styles')
  {{-- Page-specific css --}}

  {{-- ===== JS ===== --}}
  {{-- Javascript should go at the bottom for better performance --}}
@yield_section