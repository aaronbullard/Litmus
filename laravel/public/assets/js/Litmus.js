(function(window, jQuery){

	function Litmus()
	{

		this.init = function()
		{
			$(document).ready(function(){
				$(document).on('mobileinit', function(e){
					$.mobile.ajaxEnabled = false;
					clickHeaderHome();
					styleBootstrapToJqm();
				});
			});
		};


		var clickHeaderHome = function()
		{
			// $('h1', 'div[data-role="header"]').on('vclick', '', function(){
			$(document).bind('click', 'h1', function(){
				$.mobile.changePage("{{ URL::to('colormatch') }}");
				// $.mobile.navigate("#index");
			});
		};


		var styleBootstrapToJqm = function()
		{
			// Style tables
			$('table').attr('data-role', 'table')
				.addClass('table-stroke')
				.addClass('ui-responsive');
		};

	}// end Litmus

	// Bind to window and initialize...
	window.Litmus = new Litmus();
	window.Litmus.init();

})(window, jQuery);