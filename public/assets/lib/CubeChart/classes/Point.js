function Point(config)
{
	var that = this;

	this.x = config.x || 0;
	this.y = config.y || 0;
	this.z = config.z || 0;
	this.radius = config.radius || 5;

	this.getVector = function(point)
	{
		var config = {
			'x': that.x - point.x,
			'y': that.y - point.y,
			'z': that.z - point.z
		};

		return new Vector(config);
	};

	this.draw = function(ctx)
	{
		ctx.moveTo(that.x, that.y);
		ctx.beginPath();
		ctx.fillStyle = "rgb("+that.x+", "+that.y+", "+that.z+")";
		ctx.arc(that.x, that.y, that.radius, 0, 2*Math.PI);
		ctx.fill();
	};
}