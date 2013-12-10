function CubeObject()
{
	var ctx			= config.ctx;
	var className	= 'CubeObject';

	this.draw = function()
	{
		alert("Must overload draw "+className+".draw()!");
	};
}