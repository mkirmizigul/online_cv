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

                	$('.date').on('changeDate', function(ev){ //tarih seçimi yaptıktan sonra form gizlenir.
                	    $(this).datepicker('hide');
                	});
                    
              	  	$('#rootwizard').bootstrapWizard({
              	  		'tabClass': 'nav nav-tabs'
                  	  	/*,
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
              	  		},*/
              	  	
              	  	});	
                	
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
		<li><a href="#tab6" data-toggle="tab">Bilgisayar Bilgisi</a></li>
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
		<div class="tab-pane" id="tab3">
			<section style="height:518px">
	    
	    </section>
	    </div>
		<ul class="pager wizard">
			<li class="previous first" style="display:none;"><a href="#">İlk</a></li>
			<li class="previous"><a href="#">Geri</a></li>
			<li class="next last" style="display:none;"><a href="#">Son</a></li>
		  	<li class="next"><a href="#">İleri</a></li>
		</ul>
	</div>	
</div>
</div>
</form>
      
            
            
</body>
</html>

