function Axis(config)
{
	var that	= this;

	this.name	= config.name;
	this.point	= config.origin;
	this.vector = config.vector;

	this.draw = function(ctx)
	{
		ctx.beginPath();
		ctx.strokeStyle = 'rgb( 0, 0, 0)';
		ctx.moveTo(that.point.x, that.point.y);
		ctx.lineTo(that.point.x + that.vector.x, that.point.y + that.vector.y);
		ctx.stroke();
	};

}