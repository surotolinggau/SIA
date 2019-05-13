<div id="formulir_lihat_profil" class="admin_formulir_muncul1">
			<div id="admin_formulir_lihat_data_ortu1">
				<?php
					$nama_pengguna_user = $nama_pengguna;
					if($hak_akses != 4){
					$tampiluser = tampilUser($nama_pengguna_user);
					}else{
					$tampiluser = tampilUser_ortu($nama_pengguna_user);
					}
					$row_user = mysqli_fetch_assoc($tampiluser);
					if($hak_akses != 4){$user_guru = $row_user['id_guru'];}
					$user_foto = $row_user['id_foto'];
					$user_foto = tampilFotouser($user_foto);
					$row_userfoto = mysqli_fetch_assoc($user_foto);
					if($row_user['status_user'] == 1){
						$stasus_user = 'Admin SIA SDN 20 Kota Lubuklinggau';
					}elseif($row_user['status_user'] == 2){
						$stasus_user = 'Kepala Sekolah SDN 20 Kota Lubuklinggau';
					}elseif($row_user['status_user'] == 3){
						$stasus_user = 'Guru SDN 20 Kota Lubuklinggau';
					}else{
						$stasus_user = 'Orangtua Murid SDN 20 Kota Lubuklinggau';
					}
				?>
				<div id="bungkus_luar_profil_user">
					<div class="bungkus_profil_user">
						<h3>PROFIL PENGGUNA</h3>
					</div>
					<div class="bungkus_profil_user">
						<div id="foto_profil_user">
							<div id="cover_imagae">
								<?php if($hak_akses != 4){?>
								<img src="../../image/guru/<?php echo $row_userfoto['nama_foto'];?>" />
								<div class="edit_ortu_sia">
									<a href="?id_guru=<?php echo $user_guru;?>#formulir_edit_guru" id="ortuEditdata">EDIT PROFIL</a>
								</div>
								<?php }else{?>
								<img src="../../image/ortu/<?php echo $row_userfoto['nama_foto'];?>" />
								<div class="edit_ortu_sia">
									<a href="?id_ortu=<?php echo $user_ortu;?>#formulir_ketiga" id="ortuEditdata">EDIT PROFIL</a>
								</div>
								<?php } ?>
							</div>
						</div>
						<div id="data_lengkap_user">
							<?php if($hak_akses != 4){?>
							<div id="bungkus_isi_profil_user">
								<span>NUPTK</span><p><?php echo $row_user['nuptk'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>No Telp</span><p><?php echo '+62'.$row_user['no_tel'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>Nama</span><p><?php echo $row_user['nama_guru'];?></p>
								<div class="clear"></div>
							</div>
							<?php }else{?>
							<div id="bungkus_isi_profil_user">
								<span>Nama </span><p><?php echo $row_user['nama_ortu'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>Pekerjaan  </span><p><?php echo $row_user['pekerjaan'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>No Telp</span><p><?php echo '+62'.$row_user['no_telp'];?></p>
								<div class="clear"></div>
							</div>
							<?php } ?>
							<div id="bungkus_isi_profil_user">
								<span>Alamat</span><p><?php echo $row_user['alamat'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>Username</span><p id="user_hitam"><?php echo $row_user['username'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>Password</span><p id="user_hitam"><?php echo $row_user['password'];?></p>
								<div class="clear"></div>
							</div>
							<div id="bungkus_isi_profil_user">
								<span>Hak Akses</span><p id="user_hitam"><?php echo $stasus_user;?></p>
								<div class="clear"></div>
							</div>
						</div>
						<div class="clear"></div>
					</div>
					<div class="bungkus_profil_user">
						<div id="tombol_user">
							<a href="?id_user=<?php echo $row_user['id_user'];?>#formulir_edit_user" id="edit_user">Edit Data User</a>
						</div>
					</div>
				</div>
			</div>
		</div>