(function(window, jQuery){

	function Litmus()
	{

		this.init = function()
		{
			defaultOverride();

			$(document).on('mobileinit', function(e){
				// $.mobile.ajaxEnabled = false;
				// clickHeaderHome();
				styleBootstrapToJqm();
				chooseImage();
				movePaletteId();
			});
		};

		var defaultOverride = function()
		{
			$(document).on("mobileinit", function(){
				$.extend(  $.mobile , {
					defaultPageTransition: 'slide'
				});
			});
		};

		var clickHeaderHome = function()
		{
			$(document).bind('click', 'h1', function(){
				alert('click');
				$.mobile.changePage("#index");
			});
		};

		var styleBootstrapToJqm = function()
		{
			// Style tables
			$('table').attr('data-role', 'table')
				.addClass('table-stroke')
				.addClass('ui-responsive');
		};

		var chooseImage = function()
		{
			var button	= $("#chooseImage");
			var input	= $("input[name='image']");

			input.on('change', function()
			{
				if( input.val() !== '' )
				{
					button.buttonMarkup({icon: 'check'});
				}else{
					button.buttonMarkup({icon: 'info'});
				}
			});

			button.on('click', function()
			{
				input.trigger('click');
			});
		};

		var movePaletteId = function()
		{
			var pid = $("#pid");
			pid.on('change', function(){
				// Put value into the hidden input tag
				$("#palette_id").val( pid.val() );
				// Show value
				$("#paletteValue").html( pid.val() );
			});
		};

	}// end Litmus

	// Bind to window and initialize...
	window.Litmus = new Litmus();
	window.Litmus.init();

})(window, jQuery);