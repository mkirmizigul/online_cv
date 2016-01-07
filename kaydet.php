
<?php



error_reporting(E_ALL);
ini_set('display_errors', '1');

include 'DB.php';

if (is_ajax()) {
	
	$json_array=json_decode($_POST['data'],true);
	
	if($json_array['trans']==0){
		insertCV();
	}else{
		updateCV();
	}
}
	
	
	
function is_ajax() {
return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}
function insertCV(){

	
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
	
	$kariyerDen=$json_array['kariyerDen'];
	
	$isletim_sistemleri=$json_array['isletim_sistemleri'];
	
	$programlama_dilleri=$json_array['programlama_dilleri'];
	
	$diger=$json_array['diger'];
	
	$egitim=$json_array['egitim'];
	
	$kurs=$json_array['kurs'];
	
	$dil=$json_array['dil'];
	
	/*kişisel bilgiler*/
	
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
	
	/*kişisel bilgiler*/
	
	$last_id=$conn->lastInsertId();
	
	/*profesyonel deneyim*/
	
	$conn=null;
	
	$conn=connection();
	
	$sqlPro = "INSERT INTO profesyonel_deneyim(firma_bilgisi,baslangic_tarihi,ayrilma_tarihi,pozisyon,sehir,ilce,aciklamalar,id_kisisel_bilgiler)";
	$sqlPro .=" VALUES (:firma_bilgisi,:baslangic_tarihi,:ayrilma_tarihi,:pozisyon,:sehir,:ilce,:aciklamalar,:id_kisisel_bilgiler)";
	
	
	$query = $conn->prepare($sqlPro);
	
	
		foreach ($pro as $value) {
			$firma_bilgisi=$value['firmaBilgisi'];
			$baslangic_tarihi=$value['baslangic_tarihi'];
			$ayrilma_tarihi=$value['ayrilma_tarihi'];
			$pozisyon=$value['pozisyon'];
			$sehir=$value['sehir'];
			$ilce=$value['ilce'];
			$aciklamalar=$value['aciklamalar'];
			
			$sonuc = $query->execute(array(
					":firma_bilgisi"=>$firma_bilgisi,
					":baslangic_tarihi"=>date('Y.m.d',strtotime($baslangic_tarihi)),
					":ayrilma_tarihi"=>date('Y.m.d',strtotime($ayrilma_tarihi)),
					":pozisyon"=>$pozisyon,
					":sehir"=>$sehir,
					":ilce"=>$ilce,
					":aciklamalar"=>$aciklamalar,
					":id_kisisel_bilgiler"=>$last_id
			));
		}
		
		/*profesyonel deneyim*/
		
		$conn=null;
		
		/*kariyer_profili*/
		
		$conn=connection();
		
		$sqlKariyer = "INSERT INTO kariyer_profil(id_kisisel_bilgiler,kariyer_bilgileri)";
		$sqlKariyer .=" VALUES (:id_kisisel_bilgiler,:kariyer_bilgileri)";
		
		
		$query = $conn->prepare($sqlKariyer);

			$sonuc = $query->execute(array(
					":id_kisisel_bilgiler"=>$last_id,
					":kariyer_bilgileri"=>$kariyerDen
			));
		
		/*kariyer_profili*/
			
		$conn=null;
			
		/*bilgisayar bilgileri*/
		
		$conn=connection();
			
		$sqlBilgisayar = "INSERT INTO bilgisayar_bilgisi(isletim_sistemleri,programlama_dilleri,id_kisisel_bilgiler)";
		$sqlBilgisayar .=" VALUES (:isletim_sistemleri,:programlama_dilleri,:id_kisisel_bilgiler)";
			
			
		$query = $conn->prepare($sqlBilgisayar);
		
		$sonuc = $query->execute(array(
					":isletim_sistemleri"=>$isletim_sistemleri,
					":programlama_dilleri"=>$programlama_dilleri,
					":id_kisisel_bilgiler"=>$last_id
			));
				
		/*bilgisayar bilgileri*/
		
		$conn=null;
		
		/*egitim*/
		
		$conn=connection();
		
		$sqlEgitim = "INSERT INTO egitim(bolum_adi,fakulte_adi,ilce,mezuniyet_tarihi,okul_adi,sehir,id_kisisel_bilgiler)";
		$sqlEgitim .=" VALUES (:bolum_adi,:fakulte_adi,:ilce,:mezuniyet_tarihi,:okul_adi,:sehir,:id_kisisel_bilgiler)";
		
		
		$query = $conn->prepare($sqlEgitim);
		
		
		foreach ($egitim as $value) {
			$bolum_adi=$value['bolum_adi'];
			$fakulte_adi=$value['fakulte_adi'];
			$ilce=$value['ilce'];
			$mezuniyet_tarihi=$value['mezuniyet_tarihi'];
			$okul_adi=$value['okul_adi'];
			$sehir=$value['sehir'];
			
				
			$sonuc = $query->execute(array(
					":bolum_adi"=>$bolum_adi,
					":fakulte_adi"=>$fakulte_adi,
					":ilce"=>$ilce,
					":mezuniyet_tarihi"=>date('Y.m.d',strtotime($mezuniyet_tarihi)),
					":okul_adi"=>$okul_adi,
					":sehir"=>$sehir,
					":sehir"=>$sehir,
					":id_kisisel_bilgiler"=>$last_id
			));
		}
		/*egitim*/
		
		
		
		$conn=null;
		
		/*kurs*/
		
		$conn=connection();
			
		$sqlKurs = "INSERT INTO kurs(kurs_aciklamalar,id_kisisel_bilgiler)";
		$sqlKurs .=" VALUES (:kurs_aciklamalar,:id_kisisel_bilgiler)";

		$aciklamalar=$kurs;
			
		$query = $conn->prepare($sqlKurs);
		
		$sonuc = $query->execute(array(
				":kurs_aciklamalar"=>$aciklamalar,
				":id_kisisel_bilgiler"=>$last_id
		));
		
		/*kurs*/
		
		$conn=null;
		
		/*yabancı dil*/
		
		$conn=connection();
			
		$sqlYabanci = "INSERT INTO yabanci_dil(dil,okuma,yazma,konusma,id_kisisel_bilgiler)";
		$sqlYabanci .=" VALUES (:dil,:okuma,:yazma,:konusma,:id_kisisel_bilgiler)";

		
		$query = $conn->prepare($sqlYabanci);
		
		foreach ($dil as $value) {
			$dil=$value['dil'];
			$okuma=$value['okuma'];
			$yazma=$value['yazma'];
			$konusma=$value['konusma'];
				
			$sonuc = $query->execute(array(
					":dil"=>$dil,
					":okuma"=>$okuma,
					":yazma"=>$yazma,
					":konusma"=>$konusma,
					":id_kisisel_bilgiler"=>$last_id
			));
		}
	
	//header('Content-type: application/json');
	
	//var_dump($conn->lastInsertId());

}


function updateCV(){


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

	$kariyerDen=$json_array['kariyerDen'];

	$isletim_sistemleri=$json_array['isletim_sistemleri'];

	$programlama_dilleri=$json_array['programlama_dilleri'];

	$diger=$json_array['diger'];

	$egitim=$json_array['egitim'];

	$kurs=$json_array['kurs'];

	$dil=$json_array['dil'];

	/*kişisel bilgiler*/

	$conn=connection();

	$sql = "update kisisel_bilgiler set ad=:ad,soyad=:soyad,askerlik_hizmeti=:askerlik_hizmeti,dogum_tarihi=:dogum_tarihi,e_posta=:e_posta,medeni_durum=:medeni_durum,kariyer_profili=:kariyer_profili,telefon=:telefon";
	
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

	/*kişisel bilgiler*/

	$last_id=$conn->lastInsertId();

	/*profesyonel deneyim*/

	$conn=null;

	$conn=connection();

	$sqlProInsert = "INSERT INTO profesyonel_deneyim(firma_bilgisi,baslangic_tarihi,ayrilma_tarihi,pozisyon,sehir,ilce,aciklamalar,id_kisisel_bilgiler)";
	$sqlProInsert .=" VALUES (:firma_bilgisi,:baslangic_tarihi,:ayrilma_tarihi,:pozisyon,:sehir,:ilce,:aciklamalar,:id_kisisel_bilgiler)";


	


	foreach ($pro as $value) {
		
		$query = $conn->prepare($sqlProInsert);
		
		$firma_bilgisi=$value['firmaBilgisi'];
		$baslangic_tarihi=$value['baslangic_tarihi'];
		$ayrilma_tarihi=$value['ayrilma_tarihi'];
		$pozisyon=$value['pozisyon'];
		$sehir=$value['sehir'];
		$ilce=$value['ilce'];
		$aciklamalar=$value['aciklamalar'];
			
		/*$sonuc = $query->execute(array(
				":firma_bilgisi"=>$firma_bilgisi,
				":baslangic_tarihi"=>date('Y.m.d',strtotime($baslangic_tarihi)),
				":ayrilma_tarihi"=>date('Y.m.d',strtotime($ayrilma_tarihi)),
				":pozisyon"=>$pozisyon,
				":sehir"=>$sehir,
				":ilce"=>$ilce,
				":aciklamalar"=>$aciklamalar,
				":id_kisisel_bilgiler"=>$last_id
		));*/
	}

	/*profesyonel deneyim*/

	$conn=null;

	/*kariyer_profili*/

	$conn=connection();

	$sqlKariyer = "INSERT INTO kariyer_profil(id_kisisel_bilgiler,kariyer_bilgileri)";
	$sqlKariyer .=" VALUES (:id_kisisel_bilgiler,:kariyer_bilgileri)";


	$query = $conn->prepare($sqlKariyer);

	/*$sonuc = $query->execute(array(
			":id_kisisel_bilgiler"=>$last_id,
			":kariyer_bilgileri"=>$kariyerDen
	))*/;

	/*kariyer_profili*/
		
	$conn=null;
		
	/*bilgisayar bilgileri*/

	$conn=connection();
		
	$sqlBilgisayar = "INSERT INTO bilgisayar_bilgisi(isletim_sistemleri,programlama_dilleri,id_kisisel_bilgiler)";
	$sqlBilgisayar .=" VALUES (:isletim_sistemleri,:programlama_dilleri,:id_kisisel_bilgiler)";
		
		
	$query = $conn->prepare($sqlBilgisayar);

	/*$sonuc = $query->execute(array(
			":isletim_sistemleri"=>$isletim_sistemleri,
			":programlama_dilleri"=>$programlama_dilleri,
			":id_kisisel_bilgiler"=>$last_id
	));*/

	/*bilgisayar bilgileri*/

	$conn=null;

	/*egitim*/

	$conn=connection();

	$sqlEgitim = "INSERT INTO egitim(bolum_adi,fakulte_adi,ilce,mezuniyet_tarihi,okul_adi,sehir,id_kisisel_bilgiler)";
	$sqlEgitim .=" VALUES (:bolum_adi,:fakulte_adi,:ilce,:mezuniyet_tarihi,:okul_adi,:sehir,:id_kisisel_bilgiler)";


	//$query = $conn->prepare($sqlEgitim);


	foreach ($egitim as $value) {
		$bolum_adi=$value['bolum_adi'];
		$fakulte_adi=$value['fakulte_adi'];
		$ilce=$value['ilce'];
		$mezuniyet_tarihi=$value['mezuniyet_tarihi'];
		$okul_adi=$value['okul_adi'];
		$sehir=$value['sehir'];
			

		/*$sonuc = $query->execute(array(
				":bolum_adi"=>$bolum_adi,
				":fakulte_adi"=>$fakulte_adi,
				":ilce"=>$ilce,
				":mezuniyet_tarihi"=>date('Y.m.d',strtotime($mezuniyet_tarihi)),
				":okul_adi"=>$okul_adi,
				":sehir"=>$sehir,
				":sehir"=>$sehir,
				":id_kisisel_bilgiler"=>$last_id
		));*/
	}
	/*egitim*/



	$conn=null;

	/*kurs*/

	$conn=connection();
		
	$sqlKurs = "INSERT INTO kurs(kurs_aciklamalar,id_kisisel_bilgiler)";
	$sqlKurs .=" VALUES (:kurs_aciklamalar,:id_kisisel_bilgiler)";

	$aciklamalar=$kurs;
		
	$query = $conn->prepare($sqlKurs);

	/*$sonuc = $query->execute(array(
			":kurs_aciklamalar"=>$aciklamalar,
			":id_kisisel_bilgiler"=>$last_id
	));*/

	/*kurs*/

	$conn=null;

	/*yabancı dil*/

	$conn=connection();
		
	$sqlYabanci = "INSERT INTO yabanci_dil(dil,okuma,yazma,konusma,id_kisisel_bilgiler)";
	$sqlYabanci .=" VALUES (:dil,:okuma,:yazma,:konusma,:id_kisisel_bilgiler)";


	$query = $conn->prepare($sqlYabanci);

	foreach ($dil as $value) {
		$dil=$value['dil'];
		$okuma=$value['okuma'];
		$yazma=$value['yazma'];
		$konusma=$value['konuşma'];

		/*$sonuc = $query->execute(array(
				":dil"=>$dil,
				":okuma"=>$okuma,
				":yazma"=>$yazma,
				":konusma"=>$konusma,
				":id_kisisel_bilgiler"=>$last_id
		));*/
	}

	//header('Content-type: application/json');

	//var_dump($conn->lastInsertId());

}

?>