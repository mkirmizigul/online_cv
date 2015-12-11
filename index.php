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
        
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>    
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        
        <script src="js/jquery.cookie-1.3.1.js"></script>
        <script src="js/jquery.steps.js"></script>
        
        <script src="dist/jquery.validate.js"></script>
        
        <script src="js/custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="locales/bootstrap-datepicker.tr.min.js"></script>
        
        

    
    <link rel="stylesheet" href="dist/bootstrap-tagsinput.css">

    
    <script src="js/bootstrap-tagsinput.js"></script>
    <script src="js/jquery.bootstrap.wizard.js"></script>
    <script src="js/jquery.tabletojson.js"></script>
</head>

<body>
         <script>
             $(function ()
               {var $validator = $("#commentForm").validate({
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
                	    format: 'dd/mm/yyyy',
                	    language:'tr',
                	    todayHighlight:true,
                	});


                	$('.input-daterange').datepicker({
                	    format: 'dd/mm/yyyy',
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
                    	    format: 'dd/mm/yyyy',
                    	    language:'tr',
                    	    todayHighlight:true,
                    	});
                	});
                    
              	  	/*$('#rootwizard').bootstrapWizard({
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

                  	  		
              	  	
              	  	});	*/

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
              	

              	  $('#rootwizard .finish').click(function() {
              		alert('Finished!, Starting over!');
              		$('#rootwizard').find("a[href*='tab8']").trigger('click');

              		
              		  var table = $('#tab_pro').tableToJSON(); // Convert the table into a javascript object
              		  
              		  alert(JSON.stringify(table));
              		
              	});

              	  var i=1;
                  $("#add_row_pro").click(function(){
                   $('#addr'+i).html("<td>"+ (i+1) +
                           "</td><td>"+
                           "<input name='firmaAdi"+i+"' type='text' placeholder='Çalıştığınız Firma Adı' class='form-control input-md'  /> </td>"+
                           "<td><input  name='il"+i+"' type='text' placeholder='Çalıştığınız İl'  class='form-control input-md'></td>"+
                           "<td><input  name='ilce"+i+"' type='text' placeholder='Çalıştığınız İlçe'  class='form-control input-md'></td>"+
                           "<td><div class='input-group input-daterange' style='width:250px'>"+
               			"<input id='baslangic"+i+"' name='baslangic"+i+"' type='text' placeholder='Başlangıç' class='form-control' value=''>"+
               			"<span class='input-group-addon'>-</span>"+
               			"<input id='bitis"+i+"' name='bitis"+i+"' type='text' placeholder='Bitiş' class='form-control' value=''>"+
           				"</div></td>"+
                           "<td><input  name='pozisyon"+i+"' type='text' placeholder='Çalıştığınız Pozisyon'  class='form-control input-md'></td>"+
                           "<td><input  name='pozisyondetay"+i+"' type='text' placeholder='Çalıştığınız Pozisyon Detayları'  class='form-control input-md'></td>"
                           );

                   $('#tab_pro').append('<tr id="addr'+(i+1)+'"></tr>');
                   i++; 
               });
                  $("#delete_row_pro").click(function(){
                 	 if(i>1){
             		 $("#addr"+(i-1)).html('');
             		 i--;
             		 }
             	 });

					/*eğitim tablo*/
                  var i=1;
                  $("#add_row_egitim").click(function(){
                   $('#addr_egitim'+i).html("<td>"+ (i+1) +
                           "</td><td>"+
                           "<input name='okuladi1_"+i+"' type='text' placeholder='Çalıştığınız Firma Adı' class='form-control input-md'  /> </td>"+
                           "<td><input  name='il"+i+"' type='text' placeholder='Çalıştığınız İl'  class='form-control input-md'></td>"+
                           "<td><input  name='ilce"+i+"' type='text' placeholder='Çalıştığınız İlçe'  class='form-control input-md'></td>"+
                           "<td><div class='input-group input-daterange' style='width:250px'>"+
               			"<input id='baslangic"+i+"' name='baslangic"+i+"' type='text' placeholder='Başlangıç' class='form-control' value=''>"+
               			"<span class='input-group-addon'>-</span>"+
               			"<input id='bitis"+i+"' name='bitis"+i+"' type='text' placeholder='Bitiş' class='form-control' value=''>"+
           				"</div></td>"+
                           "<td><input  name='pozisyon"+i+"' type='text' placeholder='Çalıştığınız Pozisyon'  class='form-control input-md'></td>"+
                           "<td><input  name='pozisyondetay"+i+"' type='text' placeholder='Çalıştığınız Pozisyon Detayları'  class='form-control input-md'></td>"
                           );

                   $('#tab_egitim').append('<tr id="addr_egitim'+(i+1)+'"></tr>');
                   i++; 
               });
                  $("#delete_row_egitim").click(function(){
                 	 if(i>1){
             		 $("#addr_egitim"+(i-1)).html('');
             		 i--;
             		 }
             	 });
                	 
                  /*eğitim tablo*/    	  	
                	
                });
            </script>
            <br>
 <div class="page-header">
  <h1>Online Özgeçmiş  <small>Uygulaması</small></h1>
</div>
      
<form id="commentForm" method="post" action="#" class="form-horizontal">
<div class="row col-lg-10">
<div id="rootwizard" >
	<ul>
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
		<section>
        <label for="ad">Adınız</label>
        <div class="form-group">
            <input placeholder="Adınız" id="ad" name="ad" type="text" class="form-control required">
        </div>
        <label for="soyad">Soyadınız</label>
        <div class="form-group">
            <input placeholder="Soyadınız" id="soyad" name="soyad" type="text" class="form-control required">
        </div>
        
        <label for="exampleInputName2">Medeni Haliniz</label>
        <br>
        <div id="exampleInputName2" class="btn-group" data-toggle="buttons">
  				<label class="btn btn-primary">
    			<input type="radio" name="medeni" id="option1" autocomplete="off">Bekar
  				</label>
  				<label class="btn btn-primary">
    			<input type="radio" name="medeni" id="option2" autocomplete="off">Evli
  				</label>
  				
		</div>
        <br>
        <br>
        
        <label for="exampleInputName2">Askerlik Durumunuz</label>
        <br>
        <div id="exampleInputName2" class="btn-group" data-toggle="buttons">
  				<label class="btn btn-primary">
    			<input type="radio" name="askerlik" id="option1" autocomplete="off">Yaptı
  				</label>
  				<label class="btn btn-primary">
    			<input type="radio" name="askerlik" id="option2" autocomplete="off">Muaf
  				</label>
  				<label class="btn btn-primary">
    			<input type="radio" name="askerlik" id="option2" autocomplete="off">Tecilli
  				</label>
  				
		</div>
        <br>
        <br>
        <label for="dogumTarihi">Doğum Tarihiniz</label>
        <div class="input-group date" data-provide="datepicker" >
    		<input type="text" class="form-control required" placeholder="Doğum Tarihiniz gün/ay/yıl" id="dogumTarihi" name="dogumTarihi">
    			<div class="input-group-addon">
        		<span class="glyphicon glyphicon-th"></span>
    		</div>
		</div>      
            <br>
        <label for="eposta">E posta adresiniz</label>
        <div class="form-group">
            <input placeholder="E-Posta Adresiniz" id="eposta" name="eposta" type="text" class="form-control required">
        </div>
            
        <div class="form-group">
        	<label for="telefon">Telefon Numaranız</label>
            <input placeholder="Telefon Numaranız" id="telefon" name="telefon" type="text" class="form-control required">
        </div>

        </section>
	    
	    </div>
	    <div class="tab-pane" id="tab2">
	    <section style="height:518px">
	    <br>
	    <br>
	    <div class="form-group">
        	<label for="kariyer">Kariyer profiliniz : </label>
          	<textarea class="form-control" rows="3" name="kariyer" id="kariyer"></textarea>
        </div>
        <div class="form-group">
        	<label for="kariyer_deneyim">Kariyer Deneyimleriniz (maddeler halinde yazmak için cümle sonlarında enter a basınız.): </label>
        	<br>
          	<input class="form-control" type="text" name="kariyer_deneyim" id="kariyer_deneyim" data-role="tagsinput" />
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
							Çalıştığınız Tarih Aralığı
						</th>
						<th class="text-center">
							Çalıştığınız Pozisyon
						</th>
						<th class="text-center">
							Çalıştığınız Pozisyon Detayları
							<br>
							(Ayırmak için lütfen başına * işaretini koyunuz)
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr0'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='firmaAdi0'  placeholder='Çalıştığınız Firma Adı' class="form-control input-md"/>
						</td>
						<td>
						<input type="text" name='il0' placeholder='Çalıştığınız İl' class="form-control"/>
						</td>
						<td>
						<input type="text" name='ilce0' placeholder='Çalıştığınız İlçe' class="form-control"/>
						</td>
						<td>
						<div class="input-group input-daterange" style="width:250px">
    			<input id="baslangic0" name="baslangic0" type="text" placeholder='Başlangıç' class="form-control" value="">
    			<span class="input-group-addon">-</span>
    			<input id="bitis0" name="bitis0" type="text" placeholder='Bitiş' class="form-control" value="">
			</div>
						</td>
						<td>
						<input type="text" name='pozisyon0' placeholder='Çalıştığınız Pozisyon' class="form-control"/>
						</td>
						<td>
						<input type="text" name='pozisyondetaylar0' placeholder='Çalıştığınız Pozisyon Detayları' class="form-control input-md"/>						
						</td>
					</tr>
                    <tr id='addr1'></tr>
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
					<tr id='addr_egitim1'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='okuladi1_0'  placeholder='Okul Adı 1' class="form-control input-md"/>
						</td>
						<td>
						<input type="text" name='okuladi2_0' placeholder='Okul Adı 1' class="form-control"/>
						</td>
						<td>
						<input type="text" name='bolumu0' placeholder='Bölümü' class="form-control"/>
						</td>
						<td>
						<input type="text" name='il0' placeholder='İl' class="form-control"/>
						</td>
						<td>
						<input type="text" name='ilce0' placeholder='ilçe' class="form-control"/>
						</td>
						<td>
						<div class="input-group date input-md" style="width: 250px" data-provide="datepicker" >
    						<input type="text" class="form-control required" placeholder="Mezuniyet Tarihiniz gün/ay/yıl" id="mezuniyet" name="mezuniyet">
    						<div class="input-group-addon">
        					<span class="glyphicon glyphicon-th"></span>
    					</div>
						</div>    
						</td>
						
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
			<a id="add_row_egitim" class="btn btn-default pull-left">Satır Ekle</a><a id='delete_row_egitim' class="pull-right btn btn-default">Satır Sil</a>
		
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
							#
						</th>
						<th class="text-center">
							Kurs Adı
						</th>
						<th class="text-center">
							Kurs Tarihi
						</th>
					</tr>
				</thead>
				<tbody>
					<tr id='addr2'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='kursadi0'  placeholder='Kurs Adı' class="form-control input-md"/>
						</td>
						
						<td>
						<div class="input-group date input-md" style="width: 250px" data-provide="datepicker" >
    						<input type="text" class="form-control required" placeholder="Kurs Tarihi gün/ay/yıl" id="mezuniyet" name="mezuniyet">
    						<div class="input-group-addon">
        					<span class="glyphicon glyphicon-th"></span>
    					</div>
						</div>    
						</td>
						
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
			<a id="add_row_pro" class="btn btn-default pull-left">Satır Ekle</a><a id='delete_row_pro' class="pull-right btn btn-default">Satır Sil</a>
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
					<tr id='addr3'>
						<td>
						1
						</td>
						<td>
						<input type="text" name='diladi0'  placeholder='Dil Adı' class="form-control input-md"/>
						</td>
						
						<td>
						<select class="form-control">
						    <option name="okuma_seviye" value="başlangıç">Başlangıç</option>
						    <option name="okuma_seviye" value="orta">Orta</option>
						    <option name="okuma_seviye" value="ileri">İleri</option>
						</select>
						</div>    
						</td>
						<td>
						<select class="form-control">
						    <option name="yazma_seviye" value="başlangıç">Başlangıç</option>
						    <option name="yazma_seviye" value="orta">Orta</option>
						    <option name="yazma_seviye" value="ileri">İleri</option>
						</select>
						</div>    
						</td>
						<td>
						<select class="form-control">
						    <option name="konusma_seviye" value="başlangıç">Başlangıç</option>
						    <option name="konusma_seviye" value="orta">Orta</option>
						    <option name="konusma_seviye" value="ileri">İleri</option>
						</select>
						</div>    
						</td>
					</tr>
                    <tr id='addr1'></tr>
				</tbody>
			</table>
			<a id="add_row_pro" class="btn btn-default pull-left">Satır Ekle</a><a id='delete_row_pro' class="pull-right btn btn-default">Satır Sil</a>
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
          	<input class="form-control" type="text" name="progralama_dili" id="progralama_dili" data-role="tagsinput" />
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
	    	</section>
	    </div>
		<ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">İlk</a></li>
			<li class="previous"><a href="#">Geri</a></li>
			<li class="next last" style="display:none;"><a href="#">Son</a></li>
		  	<li class="next"><a href="#">İleri</a></li>
		  	<li class="next finish" style="display:none;"><a href="javascript:;">Özgeçmişi Kaydet</a></li> 
		</ul>
	</div>	
</div>
</div>
</form>
      
            
            
</body>
</html>

