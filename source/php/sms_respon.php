<?php
require_once('../../source/php/init.php');

$query = "SELECT * FROM inbox WHERE Processed = 'false'";
$hasil = mysqli_query($con1, $query);
while($row=mysqli_fetch_assoc($hasil)){
	$id=$row['ID'];
	$no_pengirim=$row['SenderNumber'];
	$sms=strtoupper($row['TextDecoded']);
	$pisah= explode("#", $sms);
	$formatDepan= $pisah[0];
	$no_pengirim1= substr($no_pengirim, 3);
	$query_cekno = "SELECT * FROM ortu WHERE no_telp='$no_pengirim1'";
	$hasil_cekno = mysqli_query($con, $query_cekno);
	$tam_cekno = mysqli_fetch_assoc($hasil_cekno);
	$id_ortu = $tam_cekno['id_ortu'];
	$nama_ortu = $tam_cekno['nama_ortu'];

		$cari_murid = "SELECT * FROM murid WHERE id_ortu = '$id_ortu'";
		$query_cm = mysqli_query($con, $cari_murid);
		$id_murid = "";
		$nama_murid= "";
		$nama_murid1= mysqli_fetch_assoc($query_cm);
		$nama_murid2= $nama_murid1['nama_murid'];
		$kelas_murid="";
		$absen_murid="";
		while($row_murid=mysqli_fetch_assoc($query_cm)){
			$id_murid = $row_murid['id_murid'];
			$cari_sems = "SELECT DISTINCT semester FROM nilai, kelas_siswa WHERE nilai.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid= '$id_murid'";
			$query_crismes= mysqli_query($con, $cari_sems);
			$semester="";
			while($tam_crismes= mysqli_fetch_assoc($query_crismes)){
					$semester .= $tam_crismes['semester'].', ';
			}
			$semester= substr($semester, 0, -2);
		if($semester==""){$semester="";}else{$semester= "Semester:".$semester."\n";}
			
			$cari_kelas = "SELECT DISTINCT nama_kelas, ruang_kelas FROM kelas, kelas_siswa WHERE kelas.id_kelas=kelas_siswa.id_kelas AND kelas_siswa.id_murid= '$id_murid'";
			$query_crikls= mysqli_query($con, $cari_kelas);
			$kelas="";
			while($tam_crikls= mysqli_fetch_assoc($query_crikls)){
				$kelas .= $tam_crikls['nama_kelas'].', ';
				}
				$kelas= substr($kelas, 0, -2);
				if($kelas==""){$kelas="";}else{$kelas= "\n-Kelas(".$kelas.")";}
			
			$cari_jn = "SELECT DISTINCT nama_jenis_nilai FROM nilai, kelas_siswa, jenis_nilai WHERE nilai.id_ks=kelas_siswa.id_ks AND nilai.id_jenis_nilai=jenis_nilai.id_jenis_nilai AND kelas_siswa.id_murid= '$id_murid' order by jenis_nilai.id_jenis_nilai "; $query_jn= mysqli_query($con, $cari_jn);
			$jn="";
			while($tam_jn= mysqli_fetch_assoc($query_jn)){$jn .= $tam_jn['nama_jenis_nilai'].', ';}
			$jn= substr($jn, 0, -2);
			if($jn==""){$jn="";}else{$jn= "\n-Jenis Nilai(".$jn.")";}

			$cari_bulan = "SELECT DISTINCT bulan FROM `kehadiran`, kelas_siswa WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid='$id_murid'";
			$query_bulan= mysqli_query($con, $cari_bulan);
			$bulan="";
			while($tam_bln= mysqli_fetch_assoc($query_bulan)){$bulan .= $tam_bln['bulan'].', ';}
			$bulan= substr($bulan, 0, -2);
			if($bulan==""){$bulan="\nInfo Kehadiran Belum Di Input\n";}else{$bulan= "\n-Bulan(".$bulan.")";}

			$ket="";
			if($semester=="" AND $jn==""){$ket="\n-Belum Ada Nilai\n";}

			$kelas_murid .= $semester."Nama Murid: ".$row_murid['nama_murid'].$kelas.$jn.$ket;
			$absen_murid .= "Nama Murid: ".$row_murid['nama_murid'].$kelas.$bulan;
			}
			
	if(mysqli_num_rows($hasil_cekno) >0){

		if($sms == "INFO NILAI"){
			$balas_infonilai = "Untuk Melihat Daftar Nilai\nKetik: NILAI#SEMESTER#NAMA MURID#NAMA KELAS#JENIS NILAI\n".$kelas_murid;
			$jmlsms1 = ceil(strlen($balas_infonilai)/153);
			$pecah1 = str_split($balas_infonilai, 153);
			$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
			$query1= mysqli_query($con1, $ghghj);
			$data1= mysqli_fetch_assoc($query1);
			$newId1 = $data1['Auto_increment'];
			for ($i=1; $i <= $jmlsms1; $i++) { 
				$uhd="050003A7".sprintf("%02s", $jmlsms1).sprintf("%02s", $i);
				$msg1 =$pecah1[$i-1];
				if($i == 1){
					$query_balas1 = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msg1','$newId1','true','Gammu')";
				}else{
					$query_balas1 = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msg1','$newId1','$i')";
				}
				//echo $query_balas1;
				mysqli_query($con1, $query_balas1);
			}
		}elseif($sms == "INFO KEHADIRAN"){
			$balas_infohadir = "Untuk Melihat Info Kehadiran\nKetik: ABSEN#NAMA MURID#NAMA KELAS#ANGKA BULAN\n".$absen_murid;
			$jmlsms2 = ceil(strlen($balas_infohadir)/153);
			$pecah2 = str_split($balas_infohadir, 153);
			$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
			$query2= mysqli_query($con1, $ghghj);
			$data2= mysqli_fetch_assoc($query2);
			$newId2 = $data2['Auto_increment'];
			for ($i=1; $i <= $jmlsms2; $i++) { 
				$uhd="050003A7".sprintf("%02s", $jmlsms2).sprintf("%02s", $i);
				$msg2 =$pecah2[$i-1];

				if($i == 1){
					$query_balas2 = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msg2','$newId2','true','Gammu')";
				}else{
					$query_balas2 = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msg2','$newId2','$i')";
				}
				//echo $query_balas2;
				mysqli_query($con1, $query_balas2);
			}
		}elseif($formatDepan == "KRITIK" || $formatDepan == "SARAN" || $formatDepan == "PERTANYAAN"){
			if(!empty($pisah[1])){
				$daftarGuru="";
				$queryDaftarguru= "SELECT nama_guru FROM guru";
				$sqlDaftarguru= mysqli_query($con, $queryDaftarguru);
				while($tamDaftarguru=mysqli_fetch_assoc($sqlDaftarguru)){
					$daftarGuru .= $tamDaftarguru['nama_guru']."\n ";
				}
				$daftarGuru= substr($daftarGuru, 0, -1);

				$KSguru= $pisah[1];
				$query_KSguru= "SELECT * FROM guru WHERE nama_guru LIKE '$KSguru%'";
				$sql_KSguru= mysqli_query($con, $query_KSguru);
				$query_noTlpGuru = mysqli_fetch_assoc($sql_KSguru);
				$noTlpGuru = "+62".$query_noTlpGuru['no_tel'];
				$INamaGuru = $query_noTlpGuru['nama_guru'];
				if(mysqli_num_rows($sql_KSguru) >0){
					if(!empty($pisah[2])){
						$isiInformasi = $pisah[2];
						$smsBalasInformasi = "Terima Kasih Atas ".$formatDepan." Yang Telah Anda Sampaikan. Untuk Lebih Jelas Silahkan Kunjungi\nwww.SIASDN20LLG.com";
						$queryBI = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$smsBalasInformasi','Gammu')";
						//echo $queryBI;
						mysqli_query($con1, $queryBI);


						$sms1=$row['TextDecoded'];
						$pisahi= explode("#", $sms1);
						$isiInformasin = $pisahi[2];
						$kirimInGuru = "Anda Mendapatkan ".$formatDepan." Dari Wali Murid ".$nama_murid2." Yang Berisi:\n".$isiInformasin;
						$jmlsmsKG = ceil(strlen($kirimInGuru)/153);
						$pecahsmsKG = str_split($kirimInGuru, 153);
						$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
						$queryKG= mysqli_query($con1, $ghghj);
						$dataKG= mysqli_fetch_assoc($queryKG);
						$newIdKG = $dataKG['Auto_increment'];
							for ($i=1; $i <= $jmlsmsKG; $i++) { 
								$uhd="050003A7".sprintf("%02s", $jmlsmsKG).sprintf("%02s", $i);
								$msgKG =$pecahsmsKG[$i-1];
									if($i == 1){
										$querySMSKG = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$noTlpGuru','$uhd','$msgKG','$newIdKG','true','Gammu')";
									}else{
										$querySMSKG = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msgKG','$newIdKG','$i')";
									}
									//echo $querySMSKG;
								mysqli_query($con1, $querySMSKG);
							}

						$tanggal_masukan = date('d-M-Y');
						$jam_masukan = date('H:i:s');
						$masukkesistem = "INSERT INTO masukan (pengirim, kategori_masukan, kepada, isi_masukan, keterangan_masukan, tanggal_masukan, jam_masukan) VALUES ('$nama_ortu', '$formatDepan', '$INamaGuru', '$isiInformasin', 'Terkirim', '$tanggal_masukan','$jam_masukan')";
						mysqli_query($con, $masukkesistem);

					}else{
						$smsIsiKosong = "Isi Informasi Kosong.\n Untuk Menyampaikan Informasi.\nKetik: ".$formatDepan."#NAMA GURU#ISI ".$formatDepan."\nNAMA GURU: \n".$daftarGuru;
						$jmlsmsIsikosong = ceil(strlen($smsIsiKosong)/153);
						$pecahsmsIsikosong = str_split($smsIsiKosong, 153);
						$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
						$queryIsikosong= mysqli_query($con1, $ghghj);
						$dataIsikosong= mysqli_fetch_assoc($queryIsikosong);
						$newIdIK = $dataIsikosong['Auto_increment'];
							for ($i=1; $i <= $jmlsmsIsikosong; $i++) { 
								$uhd="050003A7".sprintf("%02s", $jmlsmsIsikosong).sprintf("%02s", $i);
								$msgIK =$pecahsmsIsikosong[$i-1];
									if($i == 1){
										$querySMSIK = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msgIK','$newIdIK','true','Gammu')";
									}else{
										$querySMSIK = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msgIK','$newIdIK','$i')";
									}
									//echo $querySMSIK;
								mysqli_query($con1, $querySMSIK);
							}
					}
				}else{
					$smsGuruTC = "Nama Guru Yang Anda Masukan Tidak Terdaftar\nKetik: ".$formatDepan."#NAMA GURU#ISI ".$formatDepan."\nNAMA GURU: \n".$daftarGuru;
					$jmlsmsGuruTC = ceil(strlen($smsGuruTC)/153);
					$pecahsmsGuruTC = str_split($smsGuruTC, 153);
					$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
					$queryGuruTC= mysqli_query($con1, $ghghj);
					$dataTC= mysqli_fetch_assoc($queryGuruTC);
					$newIdTC = $dataTC['Auto_increment'];
						for ($i=1; $i <= $jmlsmsGuruTC; $i++) { 
							$uhd="050003A7".sprintf("%02s", $jmlsmsGuruTC).sprintf("%02s", $i);
							$msgGuruTC =$pecahsmsGuruTC[$i-1];
								if($i == 1){
									$querySMSgurutc = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msgGuruTC','$newIdTC','true','Gammu')";
								}else{
									$querySMSgurutc = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msgGuruTC','$newIdTC','$i')";
								}
								//echo $querySMSgurutc;
							mysqli_query($con1, $querySMSgurutc);
						}
				}
			}else{
				$smsKSsalah = "Format SMS Penyampaian Informasi Salah.\nKetik: ".$formatDepan."#NAMA GURU#ISI ".$formatDepan."\n";
					$query_smsKSsalah = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$smsKSsalah','Gammu')";
					//echo $query_smsKSsalah;
					mysqli_query($con1, $query_smsKSsalah);
			}
		}elseif($formatDepan == "NILAI"){
			if(!empty($pisah[1]) AND !empty($pisah[2]) AND !empty($pisah[3])){
				$nilai_semester =$pisah[1];
				if($nilai_semester=="I" || $nilai_semester=="GANJIL"){$nilai_semester="1";}
				if($nilai_semester=="II" || $nilai_semester=="GENAP"){$nilai_semester="2";}
				$nilai_nama_murid =$pisah[2];
				$nilai_kelas = $pisah[3];
				if($nilai_kelas=="1" || $nilai_kelas=="SATU"){$nilai_kelas="I";}
				if($nilai_kelas=="2" || $nilai_kelas=="DUA"){$nilai_kelas="II";}
				if($nilai_kelas=="3" || $nilai_kelas=="TIGA"){$nilai_kelas="III";}
				if($nilai_kelas=="4" || $nilai_kelas=="EMPAT"){$nilai_kelas="IV";}
				if($nilai_kelas=="5" || $nilai_kelas=="LIMA"){$nilai_kelas="V";}
				if($nilai_kelas=="6" || $nilai_kelas=="ENAM"){$nilai_kelas="VI";}
				$filterJenis_nilai="";
					if(!empty($pisah[4])){
						$jenis_nilai = $pisah[4];
						if($jenis_nilai=="TUGAS 1"){$jenis_nilai="TUGAS I";}
						if($jenis_nilai=="TUGAS 2"){$jenis_nilai="TUGAS II";}
						if($jenis_nilai=="TUGAS 3"){$jenis_nilai="TUGAS III";}
						if($jenis_nilai=="TUGAS 4"){$jenis_nilai="TUGAS IV";}
						if($jenis_nilai=="TUGAS 5"){$jenis_nilai="TUGAS V";}
						if($jenis_nilai=="TUGAS 6"){$jenis_nilai="TUGAS VI";}
						if($jenis_nilai=="ULANGAN HARIAN 1"){$jenis_nilai="ULANGAN HARIAN I";}
						if($jenis_nilai=="ULANGAN HARIAN 2"){$jenis_nilai="ULANGAN HARIAN II";}
						if($jenis_nilai=="ULANGAN HARIAN 3"){$jenis_nilai="ULANGAN HARIAN III";}
						if($jenis_nilai != ""){$filterJenis_nilai ="AND jenis_nilai.nama_jenis_nilai='$jenis_nilai' ";}
					}
				$query_nilai_murid = "SELECT * FROM ortu,murid WHERE ortu.id_ortu=murid.id_ortu AND ortu.id_ortu = '$id_ortu' AND murid.nama_murid ='$nilai_nama_murid'";
				$sql_nilai_murid = mysqli_query($con, $query_nilai_murid);
				
				if(mysqli_num_rows($sql_nilai_murid) >0){
					$query_kirim_nilai = "SELECT * FROM jenis_nilai,nilai,kelas_siswa, kelas, murid WHERE nilai.id_jenis_nilai=jenis_nilai.id_jenis_nilai AND nilai.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid=murid.id_murid AND kelas_siswa.id_kelas=kelas.id_kelas AND murid.nama_murid='$nilai_nama_murid' AND kelas.nama_kelas='$nilai_kelas' $filterJenis_nilai ORDER BY nama_jenis_nilai";
					$sms_kirim_nilai="";
					$sql_kirim_nilai= mysqli_query($con, $query_kirim_nilai);
					if(mysqli_num_rows($sql_kirim_nilai) >0){
						while($tam_kirim_nilai=mysqli_fetch_assoc($sql_kirim_nilai)){
							$sms_kirim_nilai .= $tam_kirim_nilai['nama_jenis_nilai']."-> ".$tam_kirim_nilai['nama_mapel'].": ".$tam_kirim_nilai['nilai']."\n";
						}
						$sms_kirim_nilai="Daftar Nilai ".$nilai_nama_murid."\nSemester: ".$nilai_semester."\nKelas: ".$nilai_kelas."\n".$sms_kirim_nilai;
						$jmlsmskirimNilai = ceil(strlen($sms_kirim_nilai)/153);
						$pecahsmskirimnilai = str_split($sms_kirim_nilai, 153);
						$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
						$query3= mysqli_query($con1, $ghghj);
						$data3= mysqli_fetch_assoc($query3);
						$newId3 = $data3['Auto_increment'];
							for ($i=1; $i <= $jmlsmskirimNilai; $i++) { 
								$uhd="050003A7".sprintf("%02s", $jmlsmskirimNilai).sprintf("%02s", $i);
								$msg_kirimNilai =$pecahsmskirimnilai[$i-1];
									if($i == 1){
										$query_balas6 = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msg_kirimNilai','$newId3','true','Gammu')";
									}else{
										$query_balas6 = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msg_kirimNilai','$newId3','$i')";
									}
									//echo $query_balas6;
								mysqli_query($con1, $query_balas6);
							}
					}else{
						$sms_kirim_nilai= "Daftar Nilai Murid Tidak Ditemukan\nKetik: INFO NILAI";
						$query_balas6 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$sms_kirim_nilai','Gammu')";
					mysqli_query($con1, $query_balas6);
					}
					
				}else{
					$pesan_nama_murid= "Nama Murid Yang Dimasukan Salah\n Ketik: INFO NILAI";
					$query_balas5 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$pesan_nama_murid','Gammu')";
					//echo $query_balas5;
					mysqli_query($con1, $query_balas5);
				}
			}else{
				$msgNilaisalah="Format SMS Yang Anda Masukan Salah. Untuk Melihat Daftar Nilai\nKetik: NILAI#SEMESTER#NAMA MURID# NAMA KELAS#NAMA JENIS NILAI\nAtau\nKetik: INFO NILAI";
				$query_balas7 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$msgNilaisalah','Gammu')";
				//echo $query_balas7;
				mysqli_query($con1, $query_balas7);
			}
		}elseif($formatDepan == "ABSEN"){
			if(!empty($pisah[1]) AND !empty($pisah[2])){
				$absen_nama_murid =$pisah[1];
				$absen_kelas = $pisah[2];
				if($absen_kelas=="1" || $absen_kelas=="SATU"){$absen_kelas="I";}
				if($absen_kelas=="2" || $absen_kelas=="DUA"){$absen_kelas="II";}
				if($absen_kelas=="3" || $absen_kelas=="TIGA"){$absen_kelas="III";}
				if($absen_kelas=="4" || $absen_kelas=="EMPAT"){$absen_kelas="IV";}
				if($absen_kelas=="5" || $absen_kelas=="LIMA"){$absen_kelas="V";}
				if($absen_kelas=="6" || $absen_kelas=="ENAM"){$absen_kelas="VI";}
				$filterbulan="";
					if(!empty($pisah[3])){
						$absen_bulan = $pisah[3];
						if($absen_bulan=="1"){$absen_bulan="01";}
						if($absen_bulan=="2"){$absen_bulan="02";}
						if($absen_bulan=="3"){$absen_bulan="03";}
						if($absen_bulan=="4"){$absen_bulan="04";}
						if($absen_bulan=="5"){$absen_bulan="05";}
						if($absen_bulan=="6"){$absen_bulan="06";}
						if($absen_bulan=="7"){$absen_bulan="07";}
						if($absen_bulan=="8"){$absen_bulan="08";}
						if($absen_bulan=="9"){$absen_bulan="09";}
						if($absen_bulan != ""){$filterbulan ="AND kehadiran.bulan='$absen_bulan'";}
					}
				$query_absen = "SELECT * FROM ortu,murid WHERE ortu.id_ortu=murid.id_ortu AND ortu.id_ortu = '$id_ortu' AND murid.nama_murid ='$absen_nama_murid'";
				$sql_absen = mysqli_query($con, $query_absen);
				
				if(mysqli_num_rows($sql_absen) >0){
					$query_kirim_absen = "SELECT * FROM kehadiran, kelas_siswa, kelas, murid WHERE kehadiran.id_ks=kelas_siswa.id_ks AND kelas_siswa.id_murid=murid.id_murid AND kelas_siswa.id_kelas=kelas.id_kelas AND murid.nama_murid='$absen_nama_murid' AND kelas.nama_kelas='$absen_kelas' $filterbulan ORDER BY kehadiran.bulan, kehadiran.hari";
					$sms_kirim_absen="";
					$sql_kirim_absen= mysqli_query($con, $query_kirim_absen);
					if(mysqli_num_rows($sql_kirim_absen) >0){
						while($tam_kirim_absen=mysqli_fetch_assoc($sql_kirim_absen)){
							$sms_kirim_absen .= $tam_kirim_absen['hari']."-".$tam_kirim_absen['bulan']."-".$tam_kirim_absen['tahun'].": ".$tam_kirim_absen['keterangan_hadir']."\n";
						}
						$sms_kirim_absen="Daftar Kehadiran\n".$absen_nama_murid." Di Kelas ".$absen_kelas.": \n".$sms_kirim_absen;
						$jmlsmskirimAbsen = ceil(strlen($sms_kirim_absen)/153);
						$pecahsmskirimAbsen = str_split($sms_kirim_absen, 153);
						$ghghj= "SHOW TABLE STATUS LIKE 'outbox'";
						$query01= mysqli_query($con1, $ghghj);
						$data01= mysqli_fetch_assoc($query01);
						$newId01 = $data01['Auto_increment'];
							for ($i=1; $i <= $jmlsmskirimAbsen; $i++) { 
								$uhd="050003A7".sprintf("%02s", $jmlsmskirimAbsen).sprintf("%02s", $i);
								$msg_kirimAbsen =$pecahsmskirimAbsen[$i-1];
									if($i == 1){
										$query_balas01 = "INSERT INTO outbox (DestinationNumber, UDH, TextDecoded, ID, MultiPart, CreatorID) VALUES ('$no_pengirim','$uhd','$msg_kirimAbsen','$newId01','true','Gammu')";
									}else{
										$query_balas01 = "INSERT INTO outbox_multipart (UDH, TextDecoded, ID, SequencePosition) VALUES ('$uhd','$msg_kirimAbsen','$newId01','$i')";
									}
									//echo $query_balas01;
								mysqli_query($con1, $query_balas01);
							}
					}else{
						$sms_kirim_absen= "Daftar Kehadiran Murid Tidak Ditemukan\nKetik: INFO KEHADIRAN";
						$query_balas02 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$sms_kirim_absen','Gammu')";
						//echo $query_balas02;
					mysqli_query($con1, $query_balas02);
					}
					
				}else{
					$absen_nama_murid= "Nama Murid Yang Dimasukan Salah\n Ketik: INFO KEHADIRAN";
					$query_balas03 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$absen_nama_murid','Gammu')";
					//echo $query_balas03;
					mysqli_query($con1, $query_balas03);
				}
			}else{
				$msgkehadiransalah="Format SMS Yang Anda Masukan Salah. Untuk Melihat Daftar Kehadiran\nKetik: ABSEN#NAMA MURID#NAMA KELAS#ANGKA BULAN\nAtau\nKetik: INFO KEHADIRAN";
				$query_balasabsen = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$msgkehadiransalah','Gammu')";
				//echo $query_balasabsen;
				mysqli_query($con1, $query_balas7);
			}
		}else{
			$msgSalah="Format SMS Yang Anda Masukan Salah. Untuk Informasi Nilai\nKetik: INFO NILAI\nUntuk Informasi Kehadiran\nKetik: INFO KEHADIRAN";
			$query_balas3 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$msgSalah','Gammu')";
			//echo $query_balas3;
			mysqli_query($con1, $query_balas3);
		}

	}else{
		$balas_tdkterdaf= "Maaf No Handphone Anda Tidak Terdaftar\nSilahkan Hubungi Admin SDN 20 Kota Lubuklinggau\nwww.SIASDN20LLG.com";
		$query_balas4 = "INSERT INTO outbox (DestinationNumber, TextDecoded, CreatorID) VALUES ('$no_pengirim','$balas_tdkterdaf','Gammu')";
		//echo $query_balas4;
		mysqli_query($con1, $query_balas4);
	}
	$query_update = "UPDATE inbox SET Processed= 'true' WHERE ID = '$id'";
	//echo $query_update;
	mysqli_query($con1, $query_update);
}


?>