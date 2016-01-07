<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Özgeçmiş Uygulaması</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery.steps.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="css/bootstrap-tagsinput.css">
        
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>    
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.cookie-1.3.1.js"></script>
        <script src="js/jquery.steps.js"></script>
        <script src="js/jquery.validate.js"></script>
        
        <script src="js/bootstrap.min.js"></script>
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="js/bootstrap-datepicker.tr.min.js"></script>
    	<script src="js/bootstrap-tagsinput.js"></script>
    	<script src="js/jquery.bootstrap.wizard.js"></script>
    	
    	
       <script>

       function myFunction() {
    	   //document.getElementById("commentForm").submit();
    	   
    	   //HTMLFormElement.prototype.submit.call($('#cv_sec')[0]);
    	   document.forms["cv_sec"].submit();
		}

       
       
             $(function ()
               {

            	 
                 
				var dataAll;

				$(".js-ajax-php-json").submit(function(){
              		
              		var jsonString = JSON.stringify(dataAll);
              		
              		//data = $.param(data);
              		
              		

					
              		
              		$.ajax({
              		type: "POST",
              		cache:false,
              		url: "kaydet.php", //Relative or absolute path to response.php file
              		data: {"data":jsonString},
              		dataType: "json",
              		success: function(data) {
              			alert("Özgeçmiş başarıyla kayıt edildi.");
              		},
              		error: function (xhr, ajaxOptions, thrownError) {
              	      //  alert(xhr.status);
              	        //alert(thrownError);
              	      }
              		});
              		return false;
              		});
				

                 var $validator = $("#commentForm").validate({
                		rules: {
            				ad: {
            					required: true
            				},
            				eposta: {
            					required: true,
            					email: true,
            					maxlength: 255
            				},
            				
            				soyad: {
            					required: true,
            					maxlength: 50,
            				},
            				medeni:{
            					required: true,
            					maxlength:2
            				},
            				
            				'askerlik':{
            					required: true
            				},
            				telefon:{
            					required: true
            				},                			
            			},
            			messages: {
            				ad: {
            					required:'Adınızı giriniz.'
            				},
            				soyad: {
            					required:'Soyadınızı giriniz.'
            				},
            				eposta: {
            					required:'Eposta adresinizi giriniz.',
            					email:'Eposta adresinizi doğru formatta giriniz.'
            				},
            				dogumTarihi: {
            					required:'Doğum tarihinizi giriniz.'
            				},
            				medeni: {
            					required:'Medeni halinizi seçiniz.'
            				},
            				askerlik: {
            					required:'Askerlik durumunuzu seçiniz.'
            				},
            				telefon: {
            					required:'Telefon numaranızı giriniz'
            				}
            				
            			}
                	});
                	

                	$('.date').datepicker({
                	    format: 'dd-mm-yyyy',
                	    language:'tr',
                	    todayHighlight:true,
                	});


                	$('.input-daterange').datepicker({
                	    format: 'dd-mm-yyyy',
                	    language:'tr',
                	    todayHighlight:true,
                	});


                	$('.input-daterange').on('changeDate', function(ev){ //tarih seçimi yaptıktan sonra form gizlenir.
                	    $(this).datepicker('hide');
                	});
                	

                	$('.date').on('changeDate', function(ev){ //tarih seçimi yaptıktan sonra form gizlenir.
                	    $(this).datepicker('hide');
                	});

                	$('.input-daterange').on('changeDate', function(ev){ //tarih seçimi yaptıktan sonra form gizlenir.
                	    $(this).datepicker('hide');
                	});

                	/*$('.date_mezuniyet').datepicker({
                	    format: 'dd/mm/yyyy',
                	    language:'tr',
                	    todayHighlight:true,
                	});*/

                	$('body').on('focus',".input-daterange", function(){
                	    $(this).datepicker({
                    	    format: 'dd-mm-yyyy',
                    	    language:'tr',
                    	    todayHighlight:true,
                    	});
                	});
                    
              	  	$('#rootwizard').bootstrapWizard({
              	  		'tabClass': 'nav nav-tabs'
                  	  	,
              	  		'onNext': function(tab, navigation, index) {
              	  			var $valid = $("#commentForm").valid();
              	  			if(!$valid) {
              	  				$validator.focusInvalid();
              	  				return false;
              	  			}
              	  		},
              	  		'onTabClick':function(tab, navigation, index){
              	  			var $valid = $("#commentForm").valid();
              	  			if(!$valid) {
              	  				$validator.focusInvalid();
              	  				return false;
              	  			}
              	  		},

                  	  		
              	  	
              	  	});	

              	  $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
              		var $total = navigation.find('li').length;
              		var $current = index+1;
              		var $percent = ($current/$total) * 100;
              		
              		$('#rootwizard').find('.bar').css({width:$percent+'%'});
              		
              		// If it's the last tab then hide the last button and show the finish instead
              		if($current >= $total) {
              			$('#rootwizard').find('.pager .next').hide();
              			$('#rootwizard').find('.pager .finish').show();
              			$('#rootwizard').find('.pager .finish').removeClass('disabled');
              		} else {
              			$('#rootwizard').find('.pager .next').show();
              			$('#rootwizard').find('.pager .finish').hide();
              		}
              		
              	}});


              	  $("a[href*='tab8']").click(function(){


              		dataAll=cvWrite();

											
              		  
                  	  
                 });

                  $("#print").click(function(){
                	  window.print();

                  });

              	  $('#rootwizard .last').click(function() {

              		

        		
              		
              		dataAll=cvWrite();
      
              		
       
              		
              	});

              	function tableToJson(table) {
              	    var data = [];

              	    // first row needs to be headers
              	    var headers = [];
              	    for (var i=0; i<table.rows[0].cells.length; i++) {
              	        headers[i] = table.rows[0].cells[i].innerHTML.toLowerCase().replace(/ /gi,'');
              	    }

              	  	var t_pro=[];
              	    
              	    // go through cells
              	    for (var i=1; i<table.rows.length; i++) {

              	        var tableRow = table.rows[i];
              	        
              	        var rowData = {};
              	        
						var t_pro_detay=[];
						
              	        for (var j=0; j<tableRow.cells.length; j++) {

              	            rowData[headers[j]]= tableRow.cells[j].innerHTML;

							var test=tableRow.cells[j].innerHTML.toString().split('name="');
							var id="";
							if(test.length>1){

								var test2=test[1].split(" ");
								id=test2[0].replace("\"","");
								
							}

              	            if(id!=""){
              	            	//alert($("[name='"+id+"']").val());
								
								t_pro_detay.push($("[name='"+id+"']").val());
              	            	
                  	       }
              	           
              	            
              	        }
						
						t_pro.push(t_pro_detay);
						
              	        
              	    }       

              	    return t_pro;
              	}

              	function cvWrite(){
              		
              		$("#f_profesyonel_deneyim").empty();
              		$("#f_kariyer_deneyim").empty();
              		$("#f_egitim").empty();
              		$("#f_dil").empty();
              		$("#f_bilgisayar").empty();
              		//$("#f_kisisel").empty();
              		/*Kişisel bilgiler*/
              		
              		var trans;
              		if($("#trans").val()==""){
						trans=0;
                  	}else{
                  		trans=$("#trans").val();
                      	}
              		
              		var adi=$("#ad").val();
              		var soyadi=$("#soyad").val();
              		var email=$("#eposta").val();
              		var telefon=$("#telefon").val();
                  	var dogumTarih=$("#dogumTarihi").val();
                  	var medeni=$("input[name='medeni']:checked").val();
					var askerlik=$("input[name='askerlik']:checked").val();
					var kariyerProfili=$("#kariyer").val();
					var kariyerDen=$("#kariyer_deneyim").val();
					var profesyonelDeneyim=new Array();
					var egitim=new Array();
					var kurs=$("#kursadi0").val();
					var dil=new Array();
					var isletim_sistemleri=$("#isletim").val();
					var programlama_dilleri=$("#programlama_dili").val();
					var diger=$("#diger").val();

                  	
              		$("#f_adi").text(adi+" "+soyadi);
              		$("#f_email").text(email);
              		$("#f_telefon").text(telefon);
              		$("#f_dTarih").text(FormatDateCV(dogumTarih));
              		$("#f_medeni").text(medeni);
              		$("#f_askerlik").text(askerlik);
              		
              		/*kariyer profili*/
              		$("#f_kariyer").text(kariyerProfili);

              		kariyerDeneyim=$("#kariyer_deneyim").val().split(',');

              		for(i=0;i<kariyerDeneyim.length;i++)
              		{
                  		if(kariyerDeneyim!=""){
							$("#f_kariyer_deneyim").append("<li>"+kariyerDeneyim[i]+"</li>");
                  		}

                  	}
                  	
              		/*profesyonel deneyim*/
              		var tablePro = document.getElementById("tab_pro");

              	  	var values=[];
              		values=tableToJson(tablePro);
              		
              		for(i=0;i<values.length;i++)
              			{
              				if(values[i][0]!=""&&values[i][0]!=undefined){
              				$("#f_profesyonel_deneyim").append("<span><b>"+values[i][0]+"</b></span>,<span>"+values[i][1]+"</span>,<span>"+values[i][2]+"</span><br/>"+
              					"<b>"+values[i][5]+"</b>,"+values[i][3]+","+values[i][4]+"<br/>");
              				}else{
								continue;
                  			}
              				if(values[i][6]!=""&&values[i][6]!=undefined)
              				{
              					
								var proDetail=values[i][6].split(',');

								for(k=0;k<proDetail.length;k++){

	                      			$("#f_profesyonel_deneyim").append("<ul><li>"+proDetail[k]+"</li></ul>");		

	                          	}
									
                      		}
                      		
              				profesyonelDeneyim.push({
                              		"firmaBilgisi":values[i][0],
                              		"sehir":values[i][1],
                      				"ilce":values[i][2],
                      				"pozisyon":values[i][5],
                      				"baslangic_tarihi":FormatDateVT(values[i][3]),
                      				"ayrilma_tarihi":FormatDateVT(values[i][4]),
                      				"aciklamalar":values[i][6]
              				});

                     }

              		/*egitim*/
              		var tableEgt = document.getElementById("tab_egitim");

              	  	var values=[];
              	  	
              		values=tableToJson(tableEgt);


              		for(i=0;i<values.length;i++)
          			{
          				if(values[i][0]!=""&&values[i][0]!=undefined){
              				var vars1=values[i][0]+","+values[i][1]+","+values[i][2];
              				
              				var vars2=values[i][3]+","+values[i][4]+","+values[i][5];
              				
          				$("#f_egitim").append("<span><b>"+vars1+"</b></span><br/>"+
          					"<span>"+vars2+"</span>");

          				
                  		
          				}else{
							continue;
              			}

          				egitim.push({
							"okul_adi":values[i][0],
							"fakulte_adi":values[i][1],
							"bolum_adi":values[i][2],
							"sehir":values[i][3],
							"ilce":values[i][4],
							"mezuniyet_tarihi":FormatDateVT(values[i][5])
                        });
                 	}
                    /*kurslar*/
              		

              		$("#f_egitim").append("<br/><span><b>Kurslar :</b> "+kurs+"</span>");

              		/*yabancı dil*/

					var tableDil = document.getElementById("tab_yabanci_dil");

              	  	var values=[];
              	  	
              		values=tableToJson(tableDil);


              		for(i=0;i<values.length;i++)
          			{
          				if(values[i][0]!=""&&values[i][0]!=undefined){

          					var vars=values[i][0]+", <b>Okuma: </b>"+values[i][1]+", <b>Yazma: </b>"+values[i][2]+", <b>Konuşma: </b>"+values[i][3]+"<br/>";

          				$("#f_dil").append(vars);

							
          				
          				}else{
							continue;
              			}
          				dil.push({
							"dil":values[i][0],
							"okuma":values[i][1],
							"yazma":values[i][2],
							"konusma":values[i][3]
							});
                 	}

              		/*bilgisayar bilgisi*/
              		if($("#isletim").val()!=""&&$("#isletim").val()!=undefined){
              		$("#f_bilgisayar").append("<b>İşletim Sistemleri :</b> "+$("#isletim").val()+"<br/>");
              		$("#f_bilgisayar").append("<b>Programlama Dilleri :</b> "+$("#programlama_dili").val()+"<br/>");
              		$("#f_bilgisayar").append("<b>Diğer :</b> "+$("#diger").val());
              		}

              		var data={
                      		"trans":trans,
    						"adi":adi,
    						"soyadi":soyadi,
    						"email":email,
    						"dogumTarih":FormatDateVT(dogumTarih),
    						"telefon":telefon,
    						"askerlik":askerlik,
    						"medeni":medeni,
    						"kariyerProfili":kariyerProfili,
    						"kariyerDen":kariyerDen,
    						"profesyonelDeneyim":profesyonelDeneyim,
    						"egitim":egitim,
    						"kurs":kurs,
    						"dil":dil,
    						"isletim_sistemleri":isletim_sistemleri,
    						"programlama_dilleri":programlama_dilleri,
    						"diger":diger
    						
    					};
                 	return data;
                 }

              	function FormatDateVT(date) {
              	var chunks = date.split('-');

              	var formattedDate = chunks[2]+"-"+chunks[1]+'-'+chunks[0];

					return formattedDate;
              	
              	}

              	function FormatDateCV(date) {
                  	var chunks = date.split('-');

                  	var formattedDate = chunks[0]+"-"+chunks[1]+'-'+chunks[2];

    					return formattedDate;
                  	
                  	}
              	
              	function stopRKey(evt) { 
              	  var evt = (evt) ? evt : ((event) ? event : null); 
              	  var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null); 
              	  if ((evt.keyCode == 13) && (node.type=="text"))  {return false;} 
              	} 

              	document.onkeypress = stopRKey;

              	function SubFunc(){
                  	document.forms["commentForm"].submit();
    			};
					            	
                });
            </script>
            <style type="text/css" media="print">
   .no-print { display: none !important; }
</style>

    
</head>

<body>

<br>

 <div class="page-header no-print">
  <h1 >Online Özgeçmiş  <small>Uygulaması</small></h1>
  
</div>

<!-- <form id="commentForm" method="post" action="<?php $PHP_SELF ?>" name="commentForm" class="form-horizontal" accept-charset="utf-8"> -->
<form id="cv_sec" name="cv_sec" action="<?php $_PHP_SELF ?>" class="js-ajax-php-json" method="post" accept-charset="utf-8" style="z-index:999" >
<div style="float: right;position:absolute;right:400px;top:50px;">
	<span class="no-print">Özgeçmiş Seçin</span>
	<select name="cv" id="mySelect" onchange="myFunction()" class="form-control input-sm no-print" style="width: 200px">


	<?php 
	
	error_reporting(E_ALL);
	
	ini_set('display_errors', '1');
	
	include 'DB.php';
		
	$conn=connection();
	
	$sql="select ad,soyad,e_posta from kisisel_bilgiler";
	
	
	
	if(isset($_POST['cv'])){
		
		$email=$_POST['cv'];
		
		

		$conn2=connection();
	
		$sqlForm ="select * from kisisel_bilgiler as ks";
		$sqlForm .=" inner join kariyer_profil as kp on ks.id_kisisel_bilgiler=kp.id_kisisel_bilgiler";
		$sqlForm .=" inner join bilgisayar_bilgisi as bb on ks.id_kisisel_bilgiler=bb.id_kisisel_bilgiler";
		$sqlForm .=" inner join egitim as eg on ks.id_kisisel_bilgiler=eg.id_kisisel_bilgiler";
		$sqlForm .=" inner join kurs as kr on ks.id_kisisel_bilgiler=kr.id_kisisel_bilgiler";
		$sqlForm .=" inner join profesyonel_deneyim as pd on ks.id_kisisel_bilgiler=pd.id_kisisel_bilgiler";
		$sqlForm .=" inner join yabanci_dil as yd on ks.id_kisisel_bilgiler=yd.id_kisisel_bilgiler";
		$sqlForm .=" where ks.e_posta='".$email."'";
		
		
	
		$sonucForm = $conn2->query($sqlForm);
		$value=null;
		foreach ($conn2->query($sqlForm) as $value) {
			
		}
		//$_POST['cv']
		
				
	};
	
	function reload(){
			location.reload();
	
	}
	

	?>
	
	<option value="">CV Seç</option>
    <?php foreach ($conn->query($sql) as $row):?>
    <option value="<?php echo $row['e_posta'];?>"><?php echo $row['ad']." ".$row['soyad'];?></option>
    <?php endforeach;?>
    </select>
    
    
</div>

</form>




<input type="hidden" id="trans" value="<?php echo isset($value['id_kisisel_bilgiler'])?$value['id_kisisel_bilgiler']:"";?>">
<div class="row col-lg-10">

<div id="rootwizard" >
<form id="commentForm" action="<?php $_PHP_SELF ?>" class="js-ajax-php-json" method="post" accept-charset="utf-8" name="commentForm">
<div>
<input class="btn btn-danger no-print"   type="button" onclick="reload()" value="Yeni CV Oluştur">
</div>
<br>
</select>
	<ul class="no-print">
	  	<li><a href="#tab1" data-toggle="tab">Kişisel Bilgileriniz</a></li>
		<li><a href="#tab2" data-toggle="tab">Kariyer Profili</a></li>
		<li><a href="#tab3" data-toggle="tab">Profesyonel Deneyim</a></li>
		<li><a href="#tab4" data-toggle="tab">Eğitim</a></li>
		<li><a href="#tab5" data-toggle="tab">Kurslar</a></li>
		<li><a href="#tab6" data-toggle="tab">Yabancı Dil Bilgisi</a></li>
		<li><a href="#tab7" data-toggle="tab">Bilgisayar Bilgisi</a></li>
		<li><a href="#tab8" data-toggle="tab">Özgeçmiş Görüntüle</a></li>
	</ul>
	
	
	
	<div class="tab-content">
	    <div class="tab-pane" id="tab1">
	    <br>
		<section>
        <label for="ad">Adınız</label>
        <div class="form-group">
        
            <input placeholder="Adınız" id="ad" name="ad" type="text" class="form-control required" value="<?php echo isset($value['ad'])?$value['ad']:"";?>">
        </div>
        <label for="soyad">Soyadınız</label>
        <div class="form-group">
            <input placeholder="Soyadınız" id="soyad" name="soyad" type="text" class="form-control required"  value="<?php echo isset($value['soyad'])?$value['soyad']:"";?>">
        </div>
        
        <label for="exampleInputName2">Medeni Haliniz</label>
        <br>
        <div id="exampleInputName2" class="btn-group" data-toggle="buttons">
  				<label class="btn btn-primary <?php echo isset($value['medeni_durum'])&&$value['medeni_durum']=="Bekar"?"active":"";?>"">
    			<input <?php echo isset($value['medeni_durum'])&&$value['medeni_durum']=="Bekar"?"checked":"";?> type="radio" name="medeni" value="Bekar" >Bekar
  				</label>
  				<label class="btn btn-primary <?php echo isset($value['medeni_durum'])&&$value['medeni_durum']=="Evli"?"active":"";?>"">
    			<input <?php echo isset($value['medeni_durum'])&&$value['medeni_durum']=="Evli"?"checked":"";?> type="radio" name="medeni" value="Evli">Evli
  				</label>
  				
		</div>
        <br>
        <br>
        
        <label for="exampleInputName2">Askerlik Durumunuz</label>
        <br>
        <div id="exampleInputName2" class="btn-group" data-toggle="buttons">
  				<label class="btn btn-primary <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Yaptı"?"active":"";?>"">
    			<input <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Yaptı"?"checked":"";?> type="radio" name="askerlik" value="Yaptı" autocomplete="off">Yaptı
  				</label>
  				<label class="btn btn-primary <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Muaf"?"active":"";?>"">
    			<input <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Muaf"?"checked":"";?> type="radio" name="askerlik" value="Muaf" autocomplete="off">Muaf
  				</label>
  				<label class="btn btn-primary <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Tecilli"?"active":"";?>"">
    			<input <?php echo isset($value['askerlik_hizmeti'])&&$value['askerlik_hizmeti']=="Tecilli"?"checked":"";?> type="radio" name="askerlik" value="Tecilli" autocomplete="off">Tecilli
  				</label>
  				
		</div>
        <br>
        <br>
        <label for="dogumTarihi">Doğum Tarihiniz</label>
        <div class="input-group date" data-provide="datepicker" >
    		<input type="text" class="form-control required" value="<?php echo isset($value['dogum_tarihi'])?date('d-m-Y',strtotime($value['dogum_tarihi'])):"";?>" placeholder="Doğum Tarihiniz gün/ay/yıl" id="dogumTarihi" name="dogumTarihi" >
    			<div class="input-group-addon">
        		<span class="glyphicon glyphicon-th"></span>
    		</div>
		</div>      
            <br>
        <label for="eposta">E posta adresiniz</label>
        <div class="form-group">
            <input placeholder="E-Posta Adresiniz" id="eposta" name="eposta" type="text" class="form-control required" value="<?php echo isset($value['e_posta'])?$value['e_posta']:"";?>">
        </div>
            
        <div class="form-group">
        	<label for="telefon">Telefon Numaranız</label>
            <input placeholder="Telefon Numaranız" id="telefon" name="telefon" type="text"   value="<?php echo isset($value['telefon'])?$value['telefon']:"";?>" class="form-control required">
        </div>

        </section>
	    
	    </div>
	    <div class="tab-pane" id="tab2">
	    <section style="height:518px">
	    <br>
	    <br>
	    <div class="form-group">
        	<label for="kariyer">Kariyer profiliniz : </label>
          	<textarea class="form-control" rows="3" name="kariyer" id="kariyer"><?php echo isset($value['kariyer_profili'])?$value['kariyer_profili']:"";?></textarea>
        </div>
        <div class="form-group">
        	<label for="kariyer_deneyim">Kariyer Deneyimleriniz (maddeler halinde yazmak için cümle sonlarında enter a basınız.): </label>
        	<br>
          	<input class="form-control" type="text" value="<?php echo isset($value['kariyer_bilgileri'])?$value['kariyer_bilgileri']:"";?>" name="kariyer_deneyim" id="kariyer_deneyim" data-role="tagsinput" />
        </div>
	    </section>
	    
	      
	    </div>
	    <br>
		<div class="tab-pane" id="tab3">
			<section style="height:518px">
			
			<table class="table table-bordered table-hover" id="tab_pro">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Çalıştığınız Firma Adı
						</th>
						<th class="text-center">
							Çalıştığınız İl
						</th>
						<th class="text-center">
							Çalıştığınız İlçe
						</th>
						<th class="text-center">
							Çalışma Başlangıcı
						</th>
						<th class="text-center">
							Çalışma Bitişi
						</th>
						<th class="text-center">
							Çalıştığınız Pozisyon
						</th>
						<th class="text-center">
							Çalıştığınız Pozisyon Detayları
							<br>
							( Maddeler halinde yazmak için cümle sonlarında enter a basınız. )
						</th>
					</tr>
				</thead>
				
				<tbody>
				<?php $count=0; foreach($conn->query($sqlForm) as $row):?>
					<tr id='addr<?php echo $count;?>'>
						<td>
						<?php echo $count+1;?>
						</td>
						
						<td>
						
						<input type="text" name='firmaAdi<?php echo $count;?>' value="<?php echo isset($row['firma_bilgisi'])?$row['firma_bilgisi']:"";?>"  placeholder='Çalıştığınız Firma Adı' class="form-control input-md"/>
						</td>
						<td>
						<input type="text" name='il<?php echo $count;?>' placeholder='Çalıştığınız İl' value="<?php echo isset($row['sehir'])?$row['sehir']:"";?>" class="form-control"/>
						</td>
						<td>
						<input type="text" name='ilce<?php echo $count;?>' placeholder='Çalıştığınız İlçe' value="<?php echo isset($row['ilce'])?$row['ilce']:"";?>" class="form-control"/>
						</td>
						<td>
						<div class="input-group date input-md" style="width:250px" data-provide="datepicker">
    							<input value="<?php echo isset($row['dogum_tarihi'])?date('d-m-Y',strtotime($row['baslangic_tarihi'])):"";?>" id="baslangic<?php echo $count;?>" name="baslangic<?php echo $count;?>" type="text" placeholder='Başlangıç' class="form-control">
    							<div class="input-group-addon">
        					<span class="glyphicon glyphicon-th"></span>
						</div>
						</td>
						<td>
						<div class="input-group date input-md" style="width: 250px" data-provide="datepicker" >
    						<input value="<?php echo isset($row['dogum_tarihi'])?date('d-m-Y',strtotime($row['ayrilma_tarihi'])):"";?>" id="bitis<?php echo $count;?>" name="bitis<?php echo $count;?>" type="text" placeholder='Bitiş' class="form-control">
    						<div class="input-group-addon">
        					<span class="glyphicon glyphicon-th"></span>
    					</div>
						</div>    
						</td>
						<td>
						<input value="<?php echo isset($row['pozisyon'])?$row['pozisyon']:"";?>" type="text" name='pozisyon<?php echo $count;?>' placeholder='Çalıştığınız Pozisyon' class="form-control"/>
						</td>
						<td>
						<input class="form-control" value="<?php echo isset($row['aciklamalar'])?$row['aciklamalar']:"";?>" type="text"  name="pozisyondetaylar<?php echo $count;?>" id="pozisyondetaylar<?php echo $count;?>" data-role="tagsinput" />					
						</td>
					</tr>
					
					<?php ++$count; endforeach;?>
                    <tr id='addr<?php echo $count;?>'>
				</tbody>
			</table>
			<a id='delete_row_pro' class="pull-left btn btn-default">Satır Sil</a>
			<a id="add_row_pro" class="btn btn-default pull-right">Satır Ekle</a>
	    </section>
	    </div>
	    <div class="tab-pane" id="tab4">
			<section style="height:518px">
			<table class="table table-bordered table-hover" id="tab_egitim">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Okul Adı - 1
						</th>
						<th class="text-center">
							Okul Adı - 2
						</th>
						<th class="text-center">
							Bölümü 
						</th>
						<th class="text-center">
							İl
						</th>
						<th class="text-center">
							İlçe
						</th>
						<th class="text-center">
							Mezuniyet Tarihi
						</th>
					</tr>
				</thead>
				<tbody>
				<?php $count=0; foreach($conn->query($sqlForm) as $row):?>
					<tr id='addr_egitim<?php echo $count;?>'>
						<td>
						<?php echo $count+1;?>
						</td>
						<td>
						<input value="<?php echo isset($row['okul_adi'])?$row['okul_adi']:"";?>" type="text" name='okuladi1_<?php echo $count;?>'  placeholder='Okul Adı 1' class="form-control input-md"/>
						</td>
						<td>
						<input value="<?php echo isset($row['fakulte_adi'])?$row['fakulte_adi']:"";?>" type="text" name='okuladi2_<?php echo $count;?>' placeholder='Okul Adı 1' class="form-control"/>
						</td>
						<td>
						<input value="<?php echo isset($row['bolum_adi'])?$row['bolum_adi']:"";?>"  type="text" name='bolumu<?php echo $count;?>' placeholder='Bölümü' class="form-control"/>
						</td>
						<td>
						<input value="<?php echo isset($row['sehir'])?$row['sehir']:"";?>"  type="text" name='il_<?php echo $count;?>' placeholder='İl' class="form-control"/>
						</td>
						<td>
						<input value="<?php echo isset($row['ilce'])?$row['ilce']:"";?>"  type="text" name='ilce_<?php echo $count;?>' placeholder='ilçe' class="form-control"/>
						</td>
						<td>
						<div class="input-group date input-md" style="width: 250px" data-provide="datepicker" >
    						<input value="<?php echo isset($row['mezuniyet_tarihi'])?date('d-m-Y',strtotime($row['mezuniyet_tarihi'])):"";?>" type="text" class="form-control required" placeholder="Mezuniyet Tarihiniz gün/ay/yıl" id="mezuniyet<?php echo $count;?>" name="mezuniyet<?php echo $count;?>">
    						<div class="input-group-addon">
        					<span class="glyphicon glyphicon-th"></span>
    					</div>
						</div>    
						</td>
						
					</tr>
					<?php ++$count; endforeach;?>
					<tr id='addr_egitim1'>
				</tbody>
			</table>
			<a id='delete_row_egitim' class="pull-left btn btn-default">Satır Sil</a><a id="add_row_egitim" class="btn btn-default pull-right">Satır Ekle</a>
		
			</section>
	    </div>
	    <div class="tab-pane" id="tab5">
			<section style="height:518px">
			<label for="kariyer_deneyim">Kurs Bilgileriniz : </label>
        	<br>
          	<table class="table table-bordered table-hover" id="tab_kurs">
				<thead>
					<tr >
						<th class="text-center">
							Kurs Adı ( Kursları ayrımak için cümle sonlarında enter a basınız. )
						</th>
					</tr>
				</thead>
				<tbody>
				
					<tr id='addr2'>

						<td>
						<input  value="<?php echo isset($value['kurs_aciklamalar'])?$value['kurs_aciklamalar']:"";?>"  class="form-control" type="text"  name="kursadi0" id="kursadi0" data-role="tagsinput" />
						
						</td>

					</tr>
				
                    <tr id='addr1'></tr>
				</tbody>
			</table>
			
			</section>
	    </div>
	    <div class="tab-pane" id="tab6">
			<section style="height:518px">
			<label for="kariyer_deneyim">Yabancı Dil Bilgileriniz : </label>
        	<br>
          	<table class="table table-bordered table-hover" id="tab_yabanci_dil">
				<thead>
					<tr >
						<th class="text-center">
							#
						</th>
						<th class="text-center">
							Dil Adı
						</th>
						<th class="text-center">
							Seviye (Okuma)
						</th>
						<th class="text-center">
							Seviye (Yazma)
						</th>
						<th class="text-center">
							Seviye (Konuşma)
						</th>
					</tr>
				</thead>
				<tbody>
				<?php $count=0; foreach($conn->query($sqlForm) as $row):?>
				
					<tr id='addr_dil<?php echo $count;?>'>
						<td>
						<?php echo $count+1;?>
						</td>
						<td>
						
						<input value="<?php echo isset($row['dil'])?$row['dil']:"";?>"  type="text" name='diladi<?php echo $count;?>'  placeholder='Dil Adı' class="form-control input-md"/>
						</td>
						
						<td>
						<select class="form-control">
						    <option <?php echo isset($row['okuma'])&&$row['okuma']=="Başlangıç"?"selected":"";?> name="okuma_seviye" value="Başlangıç">Başlangıç</option>
						    <option <?php echo isset($row['okuma'])&&$row['okuma']=="Orta"?"selected":"";?> name="okuma_seviye" value="Orta">Orta</option>
						    <option <?php echo isset($row['okuma'])&&$row['okuma']=="İleri"?"selected":"";?> name="okuma_seviye" value="İleri">İleri</option>
						</select>
						</div>    
						</td>
						<td>
						<select class="form-control">
						    <option <?php echo isset($row['yazma'])&&$row['yazma']=="Başlangıç"?"selected":"";?> name="yazma_seviye" value="Başlangıç">Başlangıç</option>
						    <option <?php echo isset($row['yazma'])&&$row['yazma']=="Orta"?"selected":"";?> name="yazma_seviye" value="Orta">Orta</option>
						    <option <?php echo isset($row['yazma'])&&$row['yazma']=="İleri"?"selected":"";?> name="yazma_seviye" value="İleri">İleri</option>
						</select>
						</div>    
						</td>
						<td>
						<select class="form-control">
						    <option <?php echo isset($row['konusma'])&&$row['konusma']=="Başlangıç"?"selected":"";?> name="konusma_seviye" value="Başlangıç">Başlangıç</option>
						    <option <?php echo isset($row['konusma'])&&$row['konusma']=="Orta"?"selected":"";?> name="konusma_seviye" value="Orta">Orta</option>
						    <option <?php echo isset($row['konusma'])&&$row['konusma']=="İleri"?"selected":"";?> name="konusma_seviye" value="İleri">İleri</option>
						</select>
						</div>    
						</td>
					</tr>
					<?php ++$count; endforeach;?>
                    <tr id='addr_dil1'></tr>
				</tbody>
			</table>
			<a id="add_row_dil" class="btn btn-default pull-right">Satır Ekle</a><a id='delete_row_dil' class="pull-left btn btn-default">Satır Sil</a>
			</section>
	    </div>
	    <div class="tab-pane" id="tab7">
	    
	    <label for="ad">Bilgisayar Bilgileriniz (Maddeler halinde yazmak için cümle sonlarında enter a basınız.)</label>
	    <br>
	    <br>
			<section style="height:518px">
			<div class="form-group">
        	<label for="isletim">Bildiğiniz İşletim Sistemleri: </label>
        	<br>
          	<input class="form-control" type="text" name="isletim" id="isletim" data-role="tagsinput" />
        	</div>
        
        <div class="form-group">
            <label for="programlama_dilleri">Bildiğiniz Programlama Dilleri :</label>
        	<br>
          	<input class="form-control" type="text" name="programlama_dili" id="programlama_dili" data-role="tagsinput" />
        </div>
        
        <div class="form-group">
            <label for="diger">Bildiğiniz Diğer :</label>
        	<br>
          	<input class="form-control" type="text" name="diger" id="diger" data-role="tagsinput" />
        </div>
		</section>
		</div>
		<div class="tab-pane" id="tab8">
		
	    	<section>
	    	
	    	<div id="cv_result">
	    	<h3 id="f_adi"></h1>
	    	<span>Email: <span id="f_email"></span></span>
	    	<br/>
	    	Tel / Faks: <span id="f_telefon"></span>
	    	<br/>
	    	
	    	<h4>KARİYER PROFİLİ</h2>
	    	<hr style="color:#000">
	    	<span id="f_kariyer"></span>
	    	
	    	<ul id="f_kariyer_deneyim">
	    	
	    	</ul>
	    	
	    	<h4>PROFESYONEL DENEYİM</h2>
	    	<hr style="color:#000">
	    	<div id="f_profesyonel_deneyim">
	    	
	    	</div>
	    	
	    	<h4>EĞİTİM</h2>
	    	<hr style="color:#000">
	    	<div id="f_egitim">
	    	
	    	</div>
	    	
	    	<h4>YABANCI DİL BİLGİSİ</h2>
	    	<hr style="color:#000">
	    	<div id="f_dil">
	    	
	    	</div>
	    	
	    	<h4>BİLGİSAYAR BİLGİSİ</h2>
	    	<hr style="color:#000">
	    	<div id="f_bilgisayar">
	    	
	    	</div>
	    	
	    	<h4>KİŞİSEL BİLGİLER</h2>
	    	<hr style="color:#000">
	    	<div id="f_kisisel">
	    	<span>Doğum Tarihi: <span id="f_dTarih"></span></span>
	    	<br/>
	    	Medeni Durum : <span id="f_medeni"></span>
	    	<br/>
	    	Askerlik Hizmeti : <span id="f_askerlik"></span>
	    	</div>
	    	</div>
	    	
	    	</section>
	    </div>
	    
		<ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">İlk</a></li>
			<li class="previous no-print "><a href="#" class="no-print" >Geri</a></li>
			<li class="next last" style="display:none;"><a href="#">Son</a></li>
		  	<li class="next"><a href="#">İleri</a></li>
		  	<li class="next finish no-print"><input class="no-print" id="kaydet" name="submit" type="submit" value="Kaydet" /></li>
		  	<li class="finish"><input id="print" class="no-print" type="button" value="Yazdır" /></li>
		  	 
		</ul>
	</div>	
</div>
</div>
<script src="js/dataTables.js"></script>
</form>
      
            
            
</body>
</html>

