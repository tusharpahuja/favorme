$(document).ready(function()
{
	//alert('Hello');
	$.getJSON("favor_prac.php", function(data)
	{
		$("ul").empty();

		$.each(data.result_data,function()
		{
			$("ul").append("<time class='cbp_tmtime'><span>" + this['date'] + "</span><span>" + this['time'] + '</span></time><div class="cbp_tmlabel"><h2>' + this['favor'] +'</h2><span id="by">posted by <em>' + this['username'] +'</em></span></h2></div>' );
		});
	});
});