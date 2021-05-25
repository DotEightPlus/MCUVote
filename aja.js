$(document).ready(function() 
{

	
	//next from Modal
	$("#fresher1").click(function()
	{
		var a = $("#ajibade").text();
		var b = 'fresh_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {a:a,b:b},
		success 	:  function(data)
		{
            $("#rate").html(data);
            $("#fresher1").hide();
            $("#fresher2").hide();
        }
	    })
     })




	//next from Modal
	$("#fresher2").click(function()
	{
		var aa = $("#olamilekan").text();
		var bb = 'fresh_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aa:aa,bb:bb},
		success 	:  function(data)
		{
            $("#ratea").html(data);
            $("#fresher1").hide();
            $("#fresher2").hide();
        }
	    })
     })
})