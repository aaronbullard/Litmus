<ul class="nav nav-tabs">
@foreach($tabs as $tab)
  <li class="{{ isset($tab[2]) ? $tab[2] : NULL }}"><a href="{{ $tab[1] }}" data-toggle="tab">{{ $tab[0] }}</a></li>
@endforeach
</ul>