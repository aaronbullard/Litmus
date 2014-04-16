// Cube.prototype = new CubeObject(config);
function Cube(config)
{
	var that		= this;

	this.axes		= config.axes || [];
	this.origin		= config.origin || new Point({});
	this.dataPoints = config.points || [];

	this.draw = function(ctx)
	{
		// Draw axes
		for(var x in that.axes)
		{
			that.axes[x].draw(ctx);
		}

		// Draw origin
		that.origin.draw(ctx);

		// Draw data points
		for(var y in that.dataPoints)
		{
			that.dataPoints[y].draw(ctx);
		}
	};
	
}