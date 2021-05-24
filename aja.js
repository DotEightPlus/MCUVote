$(document).ready(function() 
{

	
	//next from Modal
	$("#fresher1").click(function()
	{
		var a = $("#ajibade").text();
		var b = $("#fresher").text();
		var pass = $("#pass").text(); 

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {a:a, b:b, pass:pass},
		success 	:  function(data)
		{
            console.log(a);
            console.log(pass);
        }
	    })

     })
})