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
    <script type="text/javascript">
$("document").ready(function(){
$(".js-ajax-php-json").submit(function(){
var data = {
"action": "test"
};
data = $(this).serialize() + "&" + $.param(data);
$.ajax({
type: "POST",
dataType: "json",
url: "response.php", //Relative or absolute path to response.php file
data: data,
success: function(data) {
$(".the-return").html(
"Favorite beverage: " + data["favorite_beverage"] + "<br />Favorite restaurant: " + data["favorite_restaurant"] + "<br />Gender: " + data["gender"] + "<br />JSON: " + data["json"]
);
alert("Form submitted successfully.\nReturned json: " + data["json"]);
}
});
return false;
});
});
</script>
<!--Put the following in the <body>-->

</head>

<body>
<form action="return.php" class="js-ajax-php-json" method="post" accept-charset="utf-8">
<input type="text" name="favorite_beverage" value="" placeholder="Favorite restaurant" />
<input type="text" name="favorite_restaurant" value="" placeholder="Favorite beverage" />
<select name="gender">
<option value="male">Male</option>
<option value="female">Female</option>
</select>
<input type="submit" name="submit" value="Submit form" />
</form>
<div class="the-return">
[HTML is replaced when successful.]
</div>   
</body>
</html>

