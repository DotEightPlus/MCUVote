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
			$("#fresher3").hide();
			$("#fresher4").hide();
        }
	    })
     })




	//male fresher2
	$("#fresher2").click(function()
	{
		var ab = $("#Otemoye").text();
		var bb = 'fresh_male';

		$.ajax ({
			type 		:  'post',
			url			:  'functions/init.php',
			data 		:  {ab:ab,bb:bb},
			success 	:  function(data)
			{
				$("#ratea").html(data);
				$("#fresher1").hide();
				$("#fresher2").hide();
				$("#fresher3").hide();
				$("#fresher4").hide();
	
			}
			})

		
     })


	 //male fresher3
	$("#fresher3").click(function()
	{
		var abq = $("#Ewarawon").text();
		var bbq = 'fresh_male';

		//alert(abq); 
		$.ajax ({
			type 		:  'post',
			url			:  'functions/init.php',
			data 		:  {abq:abq,bbq:bbq},
			success 	:  function(data)
			{
				$("#ratef3").html(data);
				$("#fresher1").hide();
				$("#fresher2").hide();
				$("#fresher3").hide();
				$("#fresher4").hide();
			}
			})

		
     })



	 //male fresher3
	$("#fresher4").click(function()
	{
		var abrq = $("#Gbadamosi").text();
		var bbrq = 'fresh_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {abrq:abrq,bbrq:bbrq},
		success 	:  function(data)
		{
            $("#ratef4").html(data);
            $("#fresher1").hide();
            $("#fresher2").hide();
			$("#fresher3").hide();
			$("#fresher4").hide();
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


	 //female fresher 3
	 $("#freshers3").click(function()
	{
		var ad3 = $("#Ibifubara").text();
		var bd3 = 'fresh_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {ad3:ad3,bd3:bd3},
		success 	:  function(data)
		{
            $("#ratefs3").html(data);
            $("#freshers1").hide();
            $("#freshers2").hide();
        }
	    })
     })


	 //female fresher 4
	 $("#freshers4").click(function()
	 {
		 var ad4 = $("#Flourish").text();
		 var bd4 = 'fresh_female';
 
		 //alert(vnmcname); 
 
		 $.ajax ({
		 type 		:  'post',
		 url		:  'functions/init.php',
		 data 		:  {ad4:ad4,bd4:bd4},
		 success 	:  function(data)
		 {
			 $("#ratefs4").html(data);
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
		var af = $("#Femi").text();
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
		var ah = $("#Uchea").text();
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
		var al = $("#Elijah").text();
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
		var ao = $("#Oginni").text();
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
		var ap = $("#Ayodele").text();
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
 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aq:aq,bq:bq},
		success 	:  function(data)
		{
            $("#ratep").html(data);
            $("#personMale1").hide();
            $("#personMale2").hide();
			$("#personMale3").hide();
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
			$("#personMale3").hide();
        }
	    })
     })

	 //personMale3
	 $("#personMale3").click(function()
	{
		var arbs3 = $("#Solomon").text();
		var brbs3 = 'maleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {arbs3:arbs3,brbs3:brbs3},
		success 	:  function(data)
		{
            $("#ratebs3").html(data);
            $("#personMale1").hide();
            $("#personMale2").hide();
			$("#personMale3").hide();
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
            $("#personFemale2").hide();
			$("#personFemale3").hide();
			$("#personFemale4").hide();
        }
	    })
     })

	//personFemale2
	$("#personFemale2").click(function()
	{
		var at = $("#Soyemi").text();
		var bt = 'femaleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {at:at,bt:bt},
		success 	:  function(data)
		{
            $("#rates").html(data);
			$("#personFemale1").hide();
            $("#personFemale2").hide();
			$("#personFemale3").hide();
			$("#personFemale4").hide();

        }
	    })
     })


	 //personFemale3
	 $("#personFemale3").click(function()
	{
		var atbss3 = $("#Atanda").text();
		var btbss3 = 'femaleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {atbss3:atbss3,btbss3:btbss3},
		success 	:  function(data)
		{
            $("#ratebss3").html(data);
			$("#personFemale1").hide();
            $("#personFemale2").hide();
			$("#personFemale3").hide();
			$("#personFemale4").hide();

        }
	    })
     })

	 //personFemale4
	$("#personFemale4").click(function()
	{
		var atbss4 = $("#Ologun").text();
		var btbss4 = 'femaleperson';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {atbss4:atbss4,btbss4:btbss4},
		success 	:  function(data)
		{
            $("#ratebss4").html(data);
			$("#personFemale1").hide();
            $("#personFemale2").hide();
			$("#personFemale3").hide();
			$("#personFemale4").hide();

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
            $("#EntreMale1").hide();
            $("#EntreMale2").hide();
            $("#EntreMale3").hide();
            $("#EntreMale4").hide();
            $("#EntreMale5").hide();
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
            $("#EntreMale1").hide();
            $("#EntreMale2").hide();
            $("#EntreMale3").hide();
            $("#EntreMale4").hide();
            $("#EntreMale5").hide();
        }
	    })
     })


	//EntreMale3
	$("#EntreMale3").click(function()
	{
		var aw = 'Oluyombo Erioluwa';
		var bw = 'enter_male';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aw:aw,bw:bw},
		success 	:  function(data)
		{
            $("#ratev").html(data);
            $("#EntreMale1").hide();
            $("#EntreMale2").hide();
            $("#EntreMale3").hide();
            $("#EntreMale4").hide();
            $("#EntreMale5").hide();
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
            $("#EntreMale1").hide();
            $("#EntreMale2").hide();
            $("#EntreMale3").hide();
            $("#EntreMale4").hide();
            $("#EntreMale5").hide();
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
            $("#EntreMale1").hide();
            $("#EntreMale2").hide();
            $("#EntreMale3").hide();
            $("#EntreMale4").hide();
            $("#EntreMale5").hide();
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
            $("#EntreFemale1").hide();
            $("#EntreFemale2").hide();
            $("#EntreFemale3").hide();
            $("#EntreFemale4").hide();
            $("#EntreFemale5").hide();
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
            $("#EntreFemale1").hide();
            $("#EntreFemale2").hide();
            $("#EntreFemale3").hide();
            $("#EntreFemale4").hide();
            $("#EntreFemale5").hide();
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
            $("#EntreFemale1").hide();
            $("#EntreFemale2").hide();
            $("#EntreFemale3").hide();
            $("#EntreFemale4").hide();
            $("#EntreFemale5").hide();
        }
	    })
     })



	//EntreFemale4
	$("#EntreFemale4").click(function()
	{
		var aad = $("#Omopariola").text();
		var bad = 'enter_female';

		//alert(vnmcname); 

		$.ajax ({
		type 		:  'post',
		url			:  'functions/init.php',
		data 		:  {aad:aad,bad:bad},
		success 	:  function(data)
		{
            $("#ratead").html(data);
            $("#EntreFemale1").hide();
            $("#EntreFemale2").hide();
            $("#EntreFemale3").hide();
            $("#EntreFemale4").hide();
            $("#EntreFemale5").hide();
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
            $("#EntreFemale1").hide();
            $("#EntreFemale2").hide();
            $("#EntreFemale3").hide();
            $("#EntreFemale4").hide();
            $("#EntreFemale5").hide();
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