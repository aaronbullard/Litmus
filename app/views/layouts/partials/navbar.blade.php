@include('layouts.partials.logo')

@section('navbar')
<div class="navbar navbar-fixed-top" id="navbar">
	<div class="navbar-inner">
		<div class="container">
			<a href="{{ route('home') }}" class="brand">@yield('logo.image') Litmus API</a>
			<!-- menu icon for mobile screens -->
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
			<div class="nav-collapse">

				<!-- Left Side -->
				<ul class="nav">
					
					<!-- Home -->
					<li class="divider-vertical"></li>
					<li>
						{{ link_to_route('accounts.index', 'Accounts') }}
					</li>
					
					<!-- Palettes -->
					<li class="divider-vertical"></li>
					<li>
						{{ link_to_route('palettes.index', 'Palettes') }}
					</li>
				</ul>

				<!-- User Dropdown -->
				<ul class="nav pull-right">
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i>
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							@if( Auth::check() )
								<li><a href="{{ route('accounts.index') }}"><i class="icon-file"></i> {{ ucfirst(Auth::user()->firstname).'\'s Account' }}</a></li>
								<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
							@else
								<li><a href="{{ route('login') }}"><i class="icon-ok"></i> Login</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('users.create') }}"><i class="icon-pencil"></i> Sign Up</a></li>
							@endif
						</ul>
					</li>
				</ul>

			</div>  <!-- End Nav Collapse -->

		</div>
	</div>
</div>
@show