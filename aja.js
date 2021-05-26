$(document).ready(function() 
{

	
	//male fresher1
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




	//male fresher2
	$("#fresher2").click(function()
	{
		var ab = $("#olamilekan").text();
		var bb = 'fresh_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ab:ab,bb:bb},
		success 	:  function(data)
		{
            $("#ratea").html(data);
            $("#fresher1").hide();
            $("#fresher2").hide();
        }
	    })
     })

	//female fresher1
	$("#freshers1").click(function()
	{
		var ac = $("#george").text();
		var bc = 'fresh_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ac:ac,bc:bc},
		success 	:  function(data)
		{
            $("#rateb").html(data);
            $("#freshers1").hide();
            $("#freshers2").hide();
        }
	    })
     })

	
	//female fresher2
	$("#freshers2").click(function()
	{
		var ad = $("#folaji").text();
		var bd = 'fresh_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ad:ad,bd:bd},
		success 	:  function(data)
		{
            $("#ratec").html(data);
            $("#freshers1").hide();
            $("#freshers2").hide();
        }
	    })
     })


	//mr1
	$("#mr1").click(function()
	{
		var ae = $("#adeleye").text();
		var be = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ae:ae,be:be},
		success 	:  function(data)
		{
            $("#rated").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })


	//mr2
	$("#mr2").click(function()
	{
		var af = $("#akinmola").text();
		var bf = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {af:af,bf:bf},
		success 	:  function(data)
		{
            $("#ratee").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })


	//mr3
	$("#mr3").click(function()
	{
		var ag = $("#opara").text();
		var bg = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ag:ag,bg:bg},
		success 	:  function(data)
		{
            $("#ratef").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })



	//mr4
	$("#mr4").click(function()
	{
		var ah = $("#kambi").text();
		var bh = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ah:ah,bh:bh},
		success 	:  function(data)
		{
            $("#rateg").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })


	//mr5
	$("#mr5").click(function()
	{
		var ai = $("#kumuyi").text();
		var bi = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ai:ai,bi:bi},
		success 	:  function(data)
		{
            $("#rateh").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })

	//mr6
	$("#mr6").click(function()
	{
		var aj = $("#ewelike").text();
		var bj = 'mr';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aj:aj,bj:bj},
		success 	:  function(data)
		{
            $("#ratei").html(data);
            $("#mr1").hide();
            $("#mr2").hide();
            $("#mr3").hide();
            $("#mr4").hide();
            $("#mr5").hide();
            $("#mr6").hide();
        }
	    })
     })


	//miss1
	$("#miss1").click(function()
	{
		var ak = $("#omomia").text();
		var bk = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ak:ak,bk:bk},
		success 	:  function(data)
		{
            $("#ratej").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })

	//miss2
	$("#miss2").click(function()
	{
		var al = $("#rasheed").text();
		var bl = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {al:al,bl:bl},
		success 	:  function(data)
		{
            $("#ratek").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })


    //miss3
	$("#miss3").click(function()
	{
		var am = $("#aremu").text();
		var bm = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {am:am,bm:bm},
		success 	:  function(data)
		{
            $("#ratel").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })


	//miss4
	$("#miss3").click(function()
	{
		var an = $("#olagunju").text();
		var bn = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {an:an,bn:bn},
		success 	:  function(data)
		{
            $("#ratem").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })

	//miss5
	$("#miss5").click(function()
	{
		var ao = $("#atanda").text();
		var bo = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ao:ao,bo:bo},
		success 	:  function(data)
		{
            $("#raten").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })

	//miss6
	$("#miss6").click(function()
	{
		var ap = $("#ologun").text();
		var bp = 'miss';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ap:ap,bp:bp},
		success 	:  function(data)
		{
            $("#rateo").html(data);
            $("#miss1").hide();
            $("#miss2").hide();
            $("#miss3").hide();
            $("#miss4").hide();
            $("#miss5").hide();
            $("#miss6").hide();
        }
	    })
     })
})