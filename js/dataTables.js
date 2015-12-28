/* profesyonel deneyim tablo*/		
var a=1;
                  $("#add_row_pro").click(function(){
                   $('#addr'+a).html("<td>"+ (a+1) +
                           "</td><td>"+
                           "<input name='firmaAdi"+a+"' type='text' placeholder='Çalıştığınız Firma Adı' class='form-control input-md'  /> </td>"+
                           "<td><input  name='il"+a+"' type='text' placeholder='Çalıştığınız İl'  class='form-control input-md'></td>"+
                           "<td><input  name='ilce"+a+"' type='text' placeholder='Çalıştığınız İlçe'  class='form-control input-md'></td>"+
                           "<td><div class='input-group date input-md' style='width:250px' data-provide='datepicker'>"+
                           "<input id='baslangic"+a+"' name='baslangic"+a+"' type='text' placeholder='Başlangıç' class='form-control' value=''>"+
							"<div class='input-group-addon'><span class='glyphicon glyphicon-th'></span></div></td>"+
							"<td><div class='input-group date input-md' style='width: 250px' data-provide='datepicker' >"+
							"<input id='bitis"+a+"' name='bitis"+a+"' type='text' placeholder='Bitiş' class='form-control' value=''>"+
							"<div class='input-group-addon'>"+
							"<span class='glyphicon glyphicon-th'></span></div></div></td>"+
               			"<span class='input-group-addon'>-</span>"+
               			"<input id='bitis"+a+"' name='bitis"+a+"' type='text' placeholder='Bitiş' class='form-control' value=''>"+
           				"</div></td>"+
                           "<td><input  name='pozisyon"+a+"' type='text' placeholder='Çalıştığınız Pozisyon'  class='form-control input-md'></td>"+
                           
                           "<td><input class='form-control' type='text'  name='pozisyondetaylar"+a+"' id='pozisyondetaylar"+a+"' data-role='tagsinput' /></td>"
                           );                   
                   $('#tab_pro').append('<tr id="addr'+(a+1)+'"></tr>');
                   a++; 
               });
                  $("#delete_row_pro").click(function(){
                 	 if(a>1){
             		 $("#addr"+(a-1)).html('');
             		 a--;
             		 }
             	 });
					/*eğitim tablo*/
                  var i2=1;
                  $("#add_row_egitim").click(function(){
                	  $('#tab_egitim').append('<tr id="addr_egitim'+(i2+1)+'"></tr>');
                   $('#addr_egitim'+i2).html("<td>"+ (i2+1) +
                           "</td><td>"+
                           "<input name='okuladi1_"+i2+"' type='text' placeholder='Okul Adı 1' class='form-control input-md'  /> </td>"+
                           "<td><input type='text' name='okuladi2_"+i2+"' placeholder='Okul Adı 2' class='form-control'/></td>"+
                           "<td><input type='text' name='bolumu"+i2+"' placeholder='Bölümü' class='form-control'/></td>"+
               			"<td><input type='text' name='il"+i2+"' placeholder='İl' class='form-control'/></td>"+
               			"<td><input type='text' name='ilce"+i2+"' placeholder='ilçe' class='form-control'/></td>"+
               			"<td><div class='input-group date input-md' style='width: 250px' data-provide='datepicker' >"+
						"<input type='text' class='form-control required' placeholder='Mezuniyet Tarihiniz gün/ay/yıl' id='mezuniyet' name='mezuniyet_"+i2+"'>"+
						"<div class='input-group-addon'>"+
						"<span class='glyphicon glyphicon-th'></span></div></div></td>"
                           );

                   
                   i2++; 
               });
                  $("#delete_row_egitim").click(function(){
                 	 if(i2>1){
             		 $("#addr_egitim"+(i2-1)).html('');
             		 i2--;
             		 }
             	 });
                  /*yabancı dil*/
                  var c=1;
                  $("#add_row_dil").click(function(){
                	  $('#tab_yabanci_dil').append('<tr id="addr_dil'+(c+1)+'"></tr>');
                   $('#addr_dil'+c).html("<td>"+ (c+1) +
                           "</td><td>"+
                           "<input name='diladi"+c+"' id='diladi"+c+"' type='text' placeholder='Dil Adı' class='form-control input-md'  /> </td>"+
                           "<td><select class='form-control'>"+
                           "<option name='okuma_seviye"+c+"' value='başlangıç'>Başlangıç</option>"+
					    	"<option name='okuma_seviye"+c+"' value='orta'>Orta</option>"+
					    	"<option name='okuma_seviye"+c+"' value='ileri'>İleri</option>"+
					    	"</select></td>"+
					    	"<td><select class='form-control'>"+
	                           "<option name='yazma_seviye"+c+"' value='başlangıç'>Başlangıç</option>"+
						    	"<option name='yazma_seviye"+c+"' value='orta'>Orta</option>"+
						    	"<option name='yazma_seviye"+c+"' value='ileri'>İleri</option>"+
						    	"</select></td>"+
						    	"<td><select class='form-control'>"+
		                           "<option name='konusma_seviye"+c+"' value='başlangıç'>Başlangıç</option>"+
							    	"<option name='konusma_seviye"+c+"' value='orta'>Orta</option>"+
							    	"<option name='konusma_seviye"+c+"' value='ileri'>İleri</option>"+
							    	"</select></td>"
                           );
                   c++; 
               });
                  $("#delete_row_dil").click(function(){
                 	 if(c){
             		 $("#addr_dil"+(c-1)).html('');
             		 c--;
             		 }
             	 });

                  