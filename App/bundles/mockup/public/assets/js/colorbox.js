$(document).ready(function(){

	var c   = document.getElementById("myCanvas");
	var ctx = c.getContext("2d");
	var img = document.getElementById("image_actual");

	c.width = img.width;
	c.height= img.height;
	ctx.drawImage(img,0,0);
	ctx.lineWidth = 10;
	ctx.strokeStyle = "black";
	ctx.strokeRect(0, 0, c.width, c.height);

	function clickme(evt,width){

		console.log('function clickme() started.');

		//Re-draw the picture
		var c   = document.getElementById("myCanvas");
		var ctx = c.getContext("2d");
		ctx.drawImage(img,0,0);
		ctx.lineWidth	= 10;
		ctx.strokeStyle	= "black";
		ctx.strokeRect(0, 0, c.width, c.height);

		//Get the location of the click event
		var offsetX     = c.offsetLeft;
		var offsetY     = $("#myCanvas").offset();
		var x           = evt.clientX - offsetX -width/2;
		var y           = evt.pageY - offsetY.top -width/2 + $("#myCanvas").scrollTop();

		//Draw a box around the click event
		ctx.lineWidth	= 1;
		ctx.strokeStyle	= "yellow";
		for(var i=0; i<5; i++){
			ctx.strokeRect(x-1,y-1,width+2,width+2);
		}

	}// end clickme()

   $("#myCanvas").bind("click",function(evt){
	   clickme(evt,20);
   });
   
}); 