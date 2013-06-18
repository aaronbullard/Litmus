<!DOCTYPE html>

<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->


<head>
  @include('modelo::head')
</head>


<body class="@yield('tags')">
  @include('modelo::body')
  @include('modelo::tail')
</body>

</html>