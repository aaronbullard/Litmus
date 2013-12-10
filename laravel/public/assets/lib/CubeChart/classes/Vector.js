function Vector(config)
{
	var that = this;
	this.x = config.x || 0;
	this.y = config.y || 0;
	this.z = config.z || 0;

	this.getString = function()
	{
		var string = "[x:"+that.x+", y:"+that.y+", z:"+that.z+"]";
		return string;
	};

	this.getMagnitude = function()
	{
		var mag = Math.sqrt(
				Math.pow(that.x, 2) +
				Math.pow(that.y, 2) +
				Math.pow(that.z, 2)
			);
		return mag;
	};

	this.draw = function(ctx)
	{
		// ctx.lineTo(
		// 	(that.point.x + that.vector.x),
		// 	(that.point.y + that.vector.y)
		// );
		// ctx.stroke();
	};
}