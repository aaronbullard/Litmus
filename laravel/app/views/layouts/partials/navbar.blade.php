@section('navbar')
<div class="navbar navbar-fixed-top" id="navbar">
	<div class="navbar-inner">
		<div class="container">
<?php /*
		{{ link_to_route('home', Config::get('mockup.app_name'), NULL, array('class' => 'brand')) }}
			
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
						{{ link_to_route('home', 'Home') }}
					</li>

					<!-- Admin -->
					<li class="divider-vertical"></li>
					<li>
						{{ link_to('admin', 'Admin') }}
					</li>
					
					<!-- Bets -->
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Bets<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('bets.index', 'All Bets') }}</li>
							<li>{{ link_to_route('bets.create', 'Create A Bet') }}</li>
						</ul>
					</li>
					
					<!-- Charities -->
					<li class="divider-vertical"></li>
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">Charities<span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li>{{ link_to_route('charities.index', 'All Charities') }}</li>
							<li>{{ link_to_route('charities.index', 'Favorite Charities') }}</li>
						</ul>
					</li>

					<!-- About BYC -->
					<li class="divider-vertical"></li>
					<li>
						{{ link_to_route('home', 'About BYC') }}
					</li>

					<!-- How it Works -->
					<li class="divider-vertical"></li>
					<li>
						{{ link_to_route('home', 'How it Works') }}
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
								<li><a href="{{ route('profile') }}"><i class="icon-file"></i> {{ ucfirst(Auth::user()->fname).'\'s Account' }}</a></li>
								<li><a href="{{ route('logout') }}"><i class="icon-off"></i> Logout</a></li>
							@else
								<li><a href="{{ route('login') }}"><i class="icon-ok"></i> Login</a></li>
								<li class="divider"></li>
								<li><a href="{{ route('signup') }}"><i class="icon-pencil"></i> Sign Up</a></li>
							@endif
						</ul>
					</li>
				</ul>

			</div>  <!-- End Nav Collapse -->
		*/	?>
		</div>
	</div>
</div>
@stop