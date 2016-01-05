
<?php



error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'DB.php';

if (is_ajax()) {
	
	test_function();
	
	
/*if (isset($_POST["action"]) && !empty($_POST["action"])) { //Checks if action value exists
$action = $_POST["action"];
switch($action) { //Switch case for value of action
case "test": test_function(); break;
}
}*/
}
//Function to check if the request is an AJAX request
function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function test_function(){

	
	$json_array=json_decode($_POST['data'],true);
	
	$adi=$json_array['adi'];
	
	$soyadi=$json_array['soyadi'];
	
	$eposta=$json_array['email'];
	
	$dogum=$json_array['dogumTarih'];
	
	$telefon=$json_array['telefon'];
	
	$askerlik=$json_array['askerlik'];
	
	$medeni=$json_array['medeni'];
	
	$pro=$json_array['profesyonelDeneyim'];
	
	$kariyer=$json_array['kariyerProfili'];
	
	
	
	$conn=connection();

	$sql = "INSERT INTO kisisel_bilgiler(ad,soyad,askerlik_hizmeti,dogum_tarihi,e_posta,medeni_durum,kariyer_profili,telefon)";
	$sql .=" VALUES (:ad,:soyad,:askerlik_hizmeti,:dogum_tarihi,:e_posta,:medeni_durum,:kariyer_profili,:telefon)";
	
	$query = $conn->prepare($sql);
	$sonuc = $query->execute(array(
			":ad"=>$adi,
			":soyad"=>$soyadi,
			":askerlik_hizmeti"=>$askerlik,
			":dogum_tarihi"=>date('Y.m.d',strtotime($dogum)),
			":e_posta"=>$eposta,
			":medeni_durum"=>$medeni,
			":kariyer_profili"=>$kariyer,
			":telefon"=>$telefon
	));
	$last_id=$conn->lastInsertId();
	$conn=null;
	
	$conn=connection();
	
	$sqlPro = "INSERT INTO profesyonel_deneyim(firma_bilgisi,baslangic_tarihi,ayrilma_tarihi,pozisyon,sehir,ulke,aciklamalar,id_kisisel_bilgiler)";
	$sqlPro .=" VALUES (:firma_bilgisi,:baslangic_tarihi,:ayrilma_tarihi,:pozisyon,:sehir,:ulke,:aciklamalar,:id_kisisel_bilgiler)";
	
	
	$query = $conn->prepare($sqlPro);
	
	
		foreach ($pro as $value) {
			$firma_bilgisi=$value['firmaBilgisi'];
			$baslangic_tarihi=$value['baslangic_tarihi'];
			$ayrilma_tarihi=$value['ayrilma_tarihi'];
			$pozisyon=$value['pozisyon'];
			$sehir=$value['sehir'];
			$ulke=$value['ulke'];
			$aciklamalar=$value['aciklamalar'];
			
			$sonuc = $query->execute(array(
					":firma_bilgisi"=>$firma_bilgisi,
					":baslangic_tarihi"=>date('Y.m.d',strtotime($baslangic_tarihi)),
					":ayrilma_tarihi"=>date('Y.m.d',strtotime($ayrilma_tarihi)),
					":pozisyon"=>$pozisyon,
					":sehir"=>$sehir,
					":ulke"=>$ulke,
					":aciklamalar"=>$aciklamalar,
					":id_kisisel_bilgiler"=>$last_id
			));
		}

	
	//header('Content-type: application/json');
	
	var_dump($conn->lastInsertId());

}
?>