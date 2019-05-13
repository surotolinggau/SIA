		$("#grup_kon_ort").change(function(){
			var id_group = $(this).val();

			$.ajax({
				url:"http://localhost/Sistem_Infrormasi_akademik_SD20LLG/source/php/kontak_grup.php?id_group="+id_group,
				cache:false,
				success:function(msg){
					var obj = JSON.parse(msg);

					$("#konten_kontak").text(" ");
					
					//alert(obj.list_kontak[0].nama_ortu);
					
					obj.list_kontak.forEach(function(ortu){
						//alert(ortu.no_telp);
						
						var isi_konten = "	<div class=\"konten_kontak\">"+
											"<div id='check_bok'>"+
												"<input type='checkbox' name='kontak_ortu[]' id='checkbox_kontak'  value='"+ortu.no_telp+"'>"+
											"</div>"+
											"<div id='kontak_nama_ortu'>"+
												"<p> "+ortu.nama_ortu+"</p>"+
											"</div>"+
											"<div id=\"kontak_nomor_telp\">"+
												"<p>"+ortu.no_telp+"</p>"+
											"</div>"+
											"<div class=\"clear\"></div>"+
											"</div>";

						$("#konten_kontak").append(isi_konten);											
						
					});
				}
			});
		});

		$('#tujuan_saran').change(function(){
			var tujuan_saran = $('#tujuan_saran').val() ;
			$.ajax({
				method: "POST",
				url: "../../source/php/cari_penerima_saran.php",
				data: { kategori_penerima : tujuan_saran },
				success: function(data){
					$("#nama_penerima").text(" ");
					$('#nama_penerima').append(data);
				}
			});
		})