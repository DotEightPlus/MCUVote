$(document).ready(function() 
{

	
	//next from Modal
	$("#fresher1").click(function()
	{
		var a = $("#Ajibade").text();
		var b = $("#fresher").text(); 

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {a:a, b:b},
		success 	:  function(data)
		{
            console.log(a);
        }
	    })

     })
})