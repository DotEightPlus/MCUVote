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
		var ad = $("#folajip").text();
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
	$("#miss4").click(function()
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

	//personMale1
	$("#personMale1").click(function()
	{
		var aq = $("#oluyombo").text();
		var bq = 'maleperson';

		alert(aq); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aq:aq,bq:bq},
		success 	:  function(data)
		{
            $("#ratep").html(data);
            $("#personMale1").hide();
            $("#personMale2").hide();
        }
	    })
     })


	//personMale2
	$("#personMale2").click(function()
	{
		var ar = $("#oladapo").text();
		var br = 'maleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ar:ar,br:br},
		success 	:  function(data)
		{
            $("#rateq").html(data);
            $("#personMale1").hide();
            $("#personMale2").hide();
        }
	    })
     })


	//personFemale1
	$("#personFemale1").click(function()
	{
		var as = $("#abiona").text();
		var bs = 'femaleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {as:as,bs:bs},
		success 	:  function(data)
		{
            $("#rater").html(data);
            $("#personFemale1").hide();
            $("#personFemale2").hide()
        }
	    })
     })

	//personFemale2
	$("#personFemale2").click(function()
	{
		var at = $("#akinsulere").text();
		var bt = 'femaleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {at:at,bt:bt},
		success 	:  function(data)
		{
            $("#rates").html(data);
            $("#personFemale1").hide()
            $("#personFemale2").hide();
        }
	    })
     })

	//EntreMale1
	$("#EntreMale1").click(function()
	{
		var au = $("#ikobi").text();
		var bu = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {au:au,bu:bu},
		success 	:  function(data)
		{
            $("#ratet").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })


	//EntreMale2
	$("#EntreMale2").click(function()
	{
		var av = $("#balogun").text();
		var bv = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {av:av,bv:bv},
		success 	:  function(data)
		{
            $("#rateu").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })


	//EntreMale3
	$("#EntreMale3").click(function()
	{
		var aw = $("#oluyombo").text();
		var bw = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aw:aw,bw:bw},
		success 	:  function(data)
		{
            $("#ratev").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })


	//EntreMale4
	$("#EntreMale4").click(function()
	{
		var ax = $("#folajid").text();
		var bx = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ax:ax,bx:bx},
		success 	:  function(data)
		{
            $("#ratew").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })


	//EntreMale5
	$("#EntreMale5").click(function()
	{
		var ay = $("#adooga").text();
		var by = 'enter_male';


		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ay:ay,by:by},
		success 	:  function(data)
		{
            $("#ratex").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })



	//EntreMale6
	$("#EntreMale6").click(function()
	{
		var az = $("#ibukun").text();
		var bz = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {az:az,bz:bz},
		success 	:  function(data)
		{
            $("#ratey").html(data);
            $("#EntreMale1").hide()
            $("#EntreMale2").hide()
            $("#EntreMale3").hide()
            $("#EntreMale4").hide()
            $("#EntreMale5").hide()
            $("#EntreMale6").hide();
        }
	    })
     })


	//EntreFemale1
	$("#EntreFemale1").click(function()
	{
		var aaa = $("#oni").text();
		var baa = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaa:aaa,baa:baa},
		success 	:  function(data)
		{
            $("#rateaa").html(data);
            $("#EntreFemale1").hide()
            $("#EntreFemale2").hide()
            $("#EntreFemale3").hide()
            $("#EntreFemale4").hide()
            $("#EntreFemale5").hide()
            $("#EntreFemale6").hide();
        }
	    })
     })



	//EntreFemale2
	$("#EntreFemale2").click(function()
	{
		var aab = $("#ojo").text();
		var bab = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aab:aab,bab:bab},
		success 	:  function(data)
		{
            $("#rateab").html(data);
            $("#EntreFemale1").hide()
            $("#EntreFemale2").hide()
            $("#EntreFemale3").hide()
            $("#EntreFemale4").hide()
            $("#EntreFemale5").hide()
            $("#EntreFemale6").hide();
        }
	    })
     })




	//EntreFemale3
	$("#EntreFemale3").click(function()
	{
		var aac = $("#ayaeibo").text();
		var bac = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aac:aac,bac:bac},
		success 	:  function(data)
		{
            $("#rateac").html(data);
            $("#EntreFemale1").hide()
            $("#EntreFemale2").hide()
            $("#EntreFemale3").hide()
            $("#EntreFemale4").hide()
            $("#EntreFemale5").hide()
            $("#EntreFemale6").hide();
        }
	    })
     })



	//EntreFemale4
	$("#EntreFemale4").click(function()
	{
		var az = $("#oladimeji").text();
		var bz = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aad:aad,bad:bad},
		success 	:  function(data)
		{
            $("#ratead").html(data);
            $("#EntreFemale1").hide()
            $("#EntreFemale2").hide()
            $("#EntreFemale3").hide()
            $("#EntreFemale4").hide()
            $("#EntreFemale5").hide()
            $("#EntreFemale6").hide();
        }
	    })
     })



	//EntreFemale5
	$("#EntreFemale5").click(function()
	{
		var aae = $("#okechukwu").text();
		var bae = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aae:aae,bae:bae},
		success 	:  function(data)
		{
            $("#rateae").html(data);
            $("#EntreFemale1").hide()
            $("#EntreFemale2").hide()
            $("#EntreFemale3").hide()
            $("#EntreFemale4").hide()
            $("#EntreFemale5").hide()
            $("#EntreFemale6").hide();
        }
	    })
     })


	//SportMale1
	$("#SportMale1").click(function()
	{
		var aaf = $("#ajibade").text();
		var baf = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaf:aaf,baf:baf},
		success 	:  function(data)
		{
            $("#rateaf").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportMale2
	$("#SportMale2").click(function()
	{
		var aag = $("#adejimi").text();
		var bag = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aag:aag,bag:bag},
		success 	:  function(data)
		{
            $("#rateag").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportMale3
	$("#SportMale3").click(function()
	{
		var aah = $("#nwoekocha").text();
		var bah = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aah:aah,bah:bah},
		success 	:  function(data)
		{
            $("#rateah").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportMale4
	$("#SportMale4").click(function()
	{
		var aai = $("#adeniran").text();
		var bai = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aai:aai,bai:bai},
		success 	:  function(data)
		{
            $("#rateai").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportMale5
	$("#SportMale5").click(function()
	{
		var aaj = $("#oladipo").text();
		var baj = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaj:aaj,baj:baj},
		success 	:  function(data)
		{
            $("#rateaj").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportMale6
	$("#SportMale6").click(function()
	{
		var aak = $("#kazeem").text();
		var bak = 'sport_man';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aak:aak,bak:bak},
		success 	:  function(data)
		{
            $("#rateak").html(data);
            $("#SportMale1").hide()
            $("#SportMale2").hide()
            $("#SportMale3").hide()
            $("#SportMale4").hide()
            $("#SportMale5").hide()
            $("#SportMale6").hide();
        }
	    })
     })


	//SportFemale1
	$("#SportFemale1").click(function()
	{
		var aal = $("#omomia").text();
		var bal = 'sport_woman';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aal:aal,bal:bal},
		success 	:  function(data)
		{
            $("#rateal").html(data);
            $("#SportFemale1").hide()
            $("#SportFemale2").hide()
            $("#SportFemale3").hide()
            $("#SportFemale4").hide();
        }
	    })
     })

	//SportFemale2
	$("#SportFemale2").click(function()
	{
		var aam = $("#ayaeibo").text();
		var bam = 'sport_woman';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aam:aam,bam:bam},
		success 	:  function(data)
		{
            $("#rateam").html(data);
            $("#SportFemale1").hide()
            $("#SportFemale2").hide()
            $("#SportFemale3").hide()
            $("#SportFemale4").hide();
        }
	    })
     })


	//SportFemale3
	$("#SportFemale3").click(function()
	{
		var aan = $("#nwana").text();
		var ban = 'sport_woman';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aan:aan,ban:ban},
		success 	:  function(data)
		{
            $("#ratean").html(data);
            $("#SportFemale1").hide()
            $("#SportFemale2").hide()
            $("#SportFemale3").hide()
            $("#SportFemale4").hide();
        }
	    })
     })


	//SportFemale4
	$("#SportFemale4").click(function()
	{
		var aao = $("#adediran").text();
		var bao = 'sport_woman';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aao:aao,bao:bao},
		success 	:  function(data)
		{
            $("#rateao").html(data);
            $("#SportFemale1").hide()
            $("#SportFemale2").hide()
            $("#SportFemale3").hide()
            $("#SportFemale4").hide();
        }
	    })
     })


	//dressMale1
	$("#dressMale1").click(function()
	{
		var aap = $("#akinmola").text();
		var bap = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aap:aap,bap:bap},
		success 	:  function(data)
		{
            $("#rateap").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressMale2
	$("#dressMale2").click(function()
	{
		var aaq = $("#balogun").text();
		var baq = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaq:aaq,baq:baq},
		success 	:  function(data)
		{
            $("#rateaq").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressMale3
	$("#dressMale3").click(function()
	{
		var aar = $("#oluyitan").text();
		var bar = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aar:aar,bar:bar},
		success 	:  function(data)
		{
            $("#ratear").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressMale4
	$("#dressMale4").click(function()
	{
		var aas = $("#abiona").text();
		var bas = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aas:aas,bas:bas},
		success 	:  function(data)
		{
            $("#rateas").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressMale5
	$("#dressMale5").click(function()
	{
		var aat = $("#adesanya").text();
		var bat = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aat:aat,bat:bat},
		success 	:  function(data)
		{
            $("#rateat").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressMale6
	$("#dressMale6").click(function()
	{
		var aau = $("#kumuyi").text();
		var bau = 'dress_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aau:aau,bau:bau},
		success 	:  function(data)
		{
            $("#rateau").html(data);
            $("#dressMale1").hide()
            $("#dressMale2").hide()
            $("#dressMale3").hide()
            $("#dressMale4").hide()
            $("#dressMale5").hide()
            $("#dressMale6").hide();
        }
	    })
     })


	//dressFemale1
	$("#dressFemale1").click(function()
	{
		var aav = $("#wisdom").text();
		var bav = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aav:aav,bav:bav},
		success 	:  function(data)
		{
            $("#rateav").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })



	//dressFemale2
	$("#dressFemale2").click(function()
	{
		var aaw = $("#adeyemi").text();
		var baw = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaw:aaw,baw:baw},
		success 	:  function(data)
		{
            $("#rateaw").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })


	//dressFemale3
	$("#dressFemale3").click(function()
	{
		var aax = $("#jimoh").text();
		var bax = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aax:aax,bax:bax},
		success 	:  function(data)
		{
            $("#rateax").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })


	//dressFemale4
	$("#dressFemale4").click(function()
	{
		var aay = $("#ayodele").text();
		var bay = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aay:aay,bay:bay},
		success 	:  function(data)
		{
            $("#rateay").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })


	//dressFemale5
	$("#dressFemale5").click(function()
	{
		var aaz = $("#adesida").text();
		var baz = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aaz:aaz,baz:baz},
		success 	:  function(data)
		{
            $("#rateaz").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })


	//dressFemale6
	$("#dressFemale6").click(function()
	{
		var aba = $("#baloguns").text();
		var bba = 'dress_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aba:aba,bba:bba},
		success 	:  function(data)
		{
            $("#rateba").html(data);
            $("#dressFemale1").hide()
            $("#dressFemale2").hide()
            $("#dressFemale3").hide()
            $("#dressFemale4").hide()
            $("#dressFemale5").hide()
            $("#dressFemale6").hide();
        }
	    })
     })
	
})