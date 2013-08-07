$(document).ready(function(){

	var c   = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");
	var img = document.getElementById("image_actual");

	function draw_image(){

		var pWidth = $("#pCanvas").width();
		
		if( pWidth < img.width ){
			c.width		= pWidth; 
			c.height	= img.height * (c.width/img.width);
		}else{
			c.width		= img.width;
			c.height	= img.height;
		}

		var lWidth		= 10;
		ctx.lineWidth	= lWidth;
		ctx.strokeStyle = "black";
		ctx.strokeRect(0, 0, c.width, c.height);
		ctx.drawImage(img, lWidth/2, lWidth/2, c.width - lWidth, c.height - lWidth);
	}

	function clickme(evt, width){

		console.log('function clickme() started.');

		//Re-draw the picture
		draw_image();

		//Get the location of the click event
		var offsetX     = c.offsetLeft;
		var offsetY     = $("#myCanvas").offset();
		var x           = evt.clientX - offsetX -width/2;
		var y           = evt.pageY - offsetY.top -width/2 + $("#myCanvas").scrollTop();

		//Draw a box around the click event
		ctx.lineWidth	= 1;
		ctx.strokeStyle	= "yellow";
		for(var i=0; i<5; i++){
			ctx.strokeRect(x-1, y-1, width+2, width+2);
		}

	}// end clickme()

/*
   $("#myCanvas").bind("click",function(evt){
	   clickme(evt, 20);
   });
*/
   draw_image();
   
}); 