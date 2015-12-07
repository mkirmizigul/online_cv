<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="tr-TR">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>jQeury.steps Demos</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/jquery.steps.css">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-datepicker.min.css">
        <script src="js/modernizr-2.6.2.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <script src="js/jquery.cookie-1.3.1.js"></script>
        <script src="js/jquery.steps.js"></script>
        <script src="js/jquery.js"></script>
        <script src="dist/jquery.validate.js"></script>
        
        <script src="js/custom.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <script src="js/bootstrap-datepicker.min.js"></script>
        <script src="locales/bootstrap-datepicker.tr.min.js"></script>
        
<title>Insert title here</title>
</head>
<body>
         <script>
                $(function ()
                {

                	var form = $("#example-form");

                	                	
                	form.validate({
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
            				
            					
            				}            			
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
            				}
            			}
                	});
                	form.children("div").steps({
                	    headerTag: "h3",
                	    bodyTag: "section",
                	    transitionEffect: "slideLeft",
                	    onStepChanging: function (event, currentIndex, newIndex)
                	    {
                	        form.validate().settings.ignore = ":disabled,:hidden";
                	        return form.valid();
                	    },
                	    onFinishing: function (event, currentIndex)
                	    {
                	        form.validate().settings.ignore = ":disabled";
                	        return form.valid();
                	    },
                	    onFinished: function (event, currentIndex)
                	    {
                	        alert("Tebrikler CV nizi Başarılı Bir Şekilde Oluşturdunuz!");
                	    }
                	});

                	$('.date').datepicker({
                	    format: 'dd/mm/yyyy',
                	    language:'tr',
                	    todayHighlight:true
                	    
                	    
                	});
                });
            </script>
            <br>
 <form id="example-form" action="#">
    <div class="row col-lg-9">
      
        <h3>Kişisel Bilgileriniz</h3>
        <section>
        <div class="form-group">
            <input placeholder="Adınız" id="ad" name="ad" type="text" class="form-control required">
        </div>
        
        <div class="form-group">
            <input placeholder="Soyadınız" id="soyad" name="soyad" type="text" class="form-control required">
        </div>
        
        <div class="input-group date" data-provide="datepicker" >
    		<input type="text" class="form-control required" placeholder="Doğum Tarihiniz gün/ay/yıl" id="dogumTarihi" name="dogumTarihi">
    			<div class="input-group-addon">
        		<span class="glyphicon glyphicon-th"></span>
    		</div>
		</div>      
            <br>
        <div class="form-group">
            <input placeholder="E-Posta Adresiniz" id="eposta" name="eposta" type="text" class="form-control required">
        </div>
            
        <div class="form-group">
            <input placeholder="Telefon Numaranız" id="telefon" name="telefon" type="text" class="form-control required">
        </div>

        </section>
        <h3>Profile</h3>
        <section>
            <label for="name">First name *</label>
            <input id="name" name="name" type="text" class="required">
            <label for="surname">Last name *</label>
            <input id="surname" name="surname" type="text" class="required">
            <label for="email">Email *</label>
            <input id="email" name="email" type="text" class="required email">
            <label for="address">Address</label>
            <input id="address" name="address" type="text">
            <p>(*) Mandatory</p>
        </section>
        <h3>Hints</h3>
        <section>
            <ul>
                <li>Foo</li>
                <li>Bar</li>
                <li>Foobar</li>
            </ul>
        </section>
        <h3>Finish</h3>
        <section>
            <input id="acceptTerms" name="acceptTerms" type="checkbox" class="required"> <label for="acceptTerms">I agree with the Terms and Conditions.</label>
        </section>
    
    </div>
</form>
</body>
</html>

