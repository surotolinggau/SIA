	<div id="formulir_kehadiran" class="admin_formulir_muncul">
		<div id="admin_formulir3">
			<?php
			$kirKelaskeha ='';
			$kirKelastah = '';
			$kirKelastad = '';
			$kirKelastgl = '';
			if(isset($_POST['kehadiran'])){
				$kirKelaskeha = $_POST['kekel'];
				$kirKelaskeh = explode('/', $kirKelaskeha);
				$kirimKelasnmha = $kirKelaskeh[0];
				$kirimKelasruha = $kirKelaskeh[1];
				$kirKelastah = $_POST['keta'];
				$kirKelastad = $_POST['ketinad'];
				$kirKelastgl = $_POST['tglhadir'];
				$arrayTgl = explode('-', $kirKelastgl);
				$hadirTahun =  $arrayTgl[0];
				$hadirBulan = $arrayTgl[1];
				$hadirHari = $arrayTgl[2];
				$hatglHadir = tanggalIndonesia($kirKelastgl);
				$querykiunidk = "SELECT * FROM kelas WHERE nama_kelas='$kirimKelasnmha' AND ruang_kelas='$kirimKelasruha' AND tahun_ajaran='$kirKelastah'";
		    	$sqlqueryikk = mysqli_query($con, $querykiunidk);
		    	if(mysqli_num_rows($sqlqueryikk) >0){
		    		$KirhadirNakel = mysqli_fetch_assoc($sqlqueryikk);
		    		$kehadiran_idkelas = $KirhadirNakel['id_kelas'];

		    		if($kirKelastad==1){
		    			$query_cekhadir = "SELECT * FROM kelas_siswa, kehadiran WHERE kelas_siswa.id_ks = kehadiran.id_ks AND kelas_siswa.id_kelas = $kehadiran_idkelas AND hari='$hadirHari' AND bulan='$hadirBulan' AND tahun=$hadirTahun";
		    			$sql_cekhadir = mysqli_query($con, $query_cekhadir);
		    			if(mysqli_num_rows($sql_cekhadir) >= 1 ){
		    				$error = "Data Kehadiran Kelas ".$kirKelaskeha." Tahun Ajaran ".$kirKelastah." Tanggal ".$hatglHadir." <br/><h3>SUDAH ADA</h3>";
							$error1 = "-";
							$error2 = " warna_error";
		    			}else{
		    				header("location: ../../login/admin/halamanadmin.php?idthdr=$kehadiran_idkelas&tgl=$kirKelastgl#formulirKehadiran");
		    			}
		    		}elseif($kirKelastad==2){
		    			$query_cekhadir = "SELECT * FROM kelas_siswa, kehadiran WHERE kelas_siswa.id_ks = kehadiran.id_ks AND kelas_siswa.id_kelas = $kehadiran_idkelas AND hari='$hadirHari' AND bulan='$hadirBulan' AND tahun=$hadirTahun";
		    			$sql_cekhadir = mysqli_query($con, $query_cekhadir);
		    			if(mysqli_num_rows($sql_cekhadir) >= 1){
		    				header("location: ../../login/admin/halamanadmin.php?idehdr=$kehadiran_idkelas&tgl=$kirKelastgl#formulirKehadiran");
		    			}else{
		    				$error = "Data Kehadiran Kelas ".$kirKelaskeha." Tahun Ajaran ".$kirKelastah." Tanggal ".$hatglHadir." <br/><h3>BELUM DI INPUT</h3>";
							$error1 = "-";
							$error2 = " warna_error";
		    			}
		    		}else{
		    			$query_cekhadir = "SELECT * FROM kelas_siswa, kehadiran WHERE kelas_siswa.id_ks = kehadiran.id_ks AND kelas_siswa.id_kelas = $kehadiran_idkelas AND hari='$hadirHari' AND bulan='$hadirBulan' AND tahun=$hadirTahun";
		    			$sql_cekhadir = mysqli_query($con, $query_cekhadir);
		    			if(mysqli_num_rows($sql_cekhadir) >= 1){
		    				header("location: ../../login/admin/halamanadmin.php?idedthdr=$kehadiran_idkelas&tgl=$kirKelastgl#formulirKehadiran");
		    			}else{
		    				$error = "Data Kehadiran Kelas ".$kirKelaskeha." Tahun Ajaran ".$kirKelastah." Tanggal ".$hatglHadir." <br/><h3>BELUM DI INPUT</h3>";
							$error1 = "-";
							$error2 = " warna_error";
		    			}
		    		}
		    	}else{
		    		$error = "Data Kelas Tidak Ada";
					$error1 = "-";
					$error2 = " warna_error";
		    	}
			}
				
			?>
			<div class="info_kelas">
				<h2 id="judul_tambah_kelas">Data Kehadiran</h2>
			</div>
			<div class="clear"></div>
			<div class="error1">
				<div class="isi_error <?php echo $error2;?>">
					<p><?php echo $error1;?></p>
					<h3><?php echo $error;?></h3>
				</div>
			</div>
			<p id="deail_kelas"> Formulir Tindakan Data Kehadiran Admin Pada Sekolah Dasar Negeri 20 Kota Lubuklinggau</p>
				<div class="bungkus_mp">
				<form action="" method="POST" >
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Tanggal</label>
						<p>Tanggal Kehadiran</p>
					</div>
					<div class="admin_formulir_kanan">
						<input type="date" name="tglhadir" value="<?php echo $kirKelastgl;?>" required>				
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Kelas</label>
						<p>Nama Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="kekel" required>
						    <option  id="opsel" value="" disabled selected>Pilih Kelas</option>
						    <?php
						    	$query = "SELECT DISTINCT nama_kelas, ruang_kelas FROM kelas ORDER BY nama_kelas, ruang_kelas";
						    	$sqlquery = mysqli_query($con, $query);
						    	while($hadirNakel = mysqli_fetch_assoc($sqlquery)){
						    		$kepinake = $hadirNakel['nama_kelas'].'/'.$hadirNakel['ruang_kelas'];
						    ?>
						    <option  value="<?php echo $kepinake;?>" <?php if ($kepinake==$kirKelaskeha){echo 'selected';} ?>><?php echo $kepinake;?></option>
						    <?php } ?>
					  	</select>									
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Tahun Ajaran</label>
						<p>Tahun Ajaran Kelas</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="keta" required>
						    <option  id="opsel" value="" disabled selected>Pilih Tahun Ajaran</option>
						    <?php
						    	$queryta = "SELECT DISTINCT tahun_ajaran FROM kelas ORDER BY tahun_ajaran";
						    	$sqlqueryta = mysqli_query($con, $queryta);
						    	while($hadirTakel = mysqli_fetch_assoc($sqlqueryta)){
						    ?>
						    <option  value="<?php echo $hadirTakel['tahun_ajaran'];?>" <?php if ($hadirTakel['tahun_ajaran']==$kirKelastah){echo 'selected';} ?>><?php echo $hadirTakel['tahun_ajaran'];?></option>
						    <?php } ?>
					  	</select>						
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<div class="admin_formulir_dalam">
					<div class="admin_formulir_kiri">
						<label for="pekerjaan_ortu">Tindakan</label>
						<p>Tindakan Admin</p>
					</div>
					<div class="admin_formulir_kanan">
						<select name="ketinad" required>
						    <option  id="opsel" value="" disabled selected>Pilih Tindakan</option>
						    <option  value="1" <?php if ($kirKelastad == '1'){echo 'selected';} ?>>Tambah Kehadiran</option>
						    <option  value="2" <?php if ($kirKelastad == '2'){echo 'selected';} ?>>Lihat Kehadiran</option>
						    <option  value="3" <?php if ($kirKelastad == '3'){echo 'selected';} ?>>Edit Kehadiran</option>
					  	</select>						
					</div>
					<div class="clear"></div>
					<hr>
				</div>
				<input type="submit" id="kdk" name="kehadiran" value="Cari Data">
			</div>

		</div>
		<div class="clear"></div>
	</div>