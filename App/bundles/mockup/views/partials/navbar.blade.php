

<div class="navbar navbar-fixed-top">
   <div class="navbar-inner">
     <div class="container">

       <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
         <span class="icon-bar"></span>
       </a>

       <a class="brand" href="{{ URL::to('mockup') }}">{{Config::get('mockup::mockup.app_name')}}</a>
       <div class="nav-collapse collapse" id="main-menu">

        <ul class="nav" id="main-menu-left">
		  
		 <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('mockup') }}">Mockup <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
			  <li><a href="{{ URL::to('mockup') }}">Upload</a></li>
			</ul>
          </li>

		  <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('litmus/admin') }}">Litmus <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="{{ URL::to('litmus/admin') }}">Admin</a></li>
			  <li><a href="{{ URL::to('litmus/admin/register') }}">Register</a></li>
              <li class="divider"></li>
              <li><a href="{{ URL::to('litmus/form') }}">Form</a></li>
            </ul>
          </li>
		  
		  <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="{{ URL::to('api/register') }}">User Api <b class="caret"></b></a>
            <ul class="dropdown-menu" id="swatch-menu">
              <li><a href="{{ URL::to('api/register') }}">Register</a></li>
              <li><a href="{{ URL::to('api/user/eea0ef13df8d2a60b53d5c4574d6331c/47360959dd2a037c3f564a59fe31eadf') }}">User's info</a></li>
            </ul>
          </li>
			
        </ul>
<!--
        <ul class="nav pull-right" id="main-menu-right">
          <li><a rel="tooltip" target="_blank" href="http://builtwithbootstrap.com/" title="" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'builtwithbootstrap']);" data-original-title="Showcase of Bootstrap sites &amp; apps">Built With Bootstrap <i class="icon-share-alt"></i></a></li>
          <li><a rel="tooltip" target="_blank" href="https://wrapbootstrap.com/?ref=bsw" title="" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'wrapbootstrap']);" data-original-title="Marketplace for premium Bootstrap templates">WrapBootstrap <i class="icon-share-alt"></i></a></li>
        </ul>
-->
       </div>
     </div>
   </div>
 </div>
