<?php
	
	function run($query){
		global $con;
		$result= mysqli_query($con,$query) or die("query tampil gagal");
		return $result;
	}


	function hasilPencarian_murid($cari_murid){
		$query="SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu AND murid.nama_murid LIKE '%$cari_murid%'";
		return run($query);
	}

	function hasilPencarian_murid1($cari_murid){
		$query="SELECT * FROM foto, murid, ortu WHERE foto.id_murid = murid.id_murid AND murid.id_ortu=ortu.id_ortu AND murid.id_murid =$cari_murid";
		return run($query);
	}

	function hasilPencarian_muridleng($id_murid,$cari_murid){
		$query="SELECT * FROM kelas, kelas_siswa, murid, foto Where kelas.id_kelas =kelas_siswa.id_kelas AND murid.id_murid = kelas_siswa.id_murid AND murid.id_murid=foto.id_murid AND kelas.id_kelas = $id_murid AND murid.nama_murid LIKE '%$cari_murid%'";
		return run($query);
	}

	function hasilPencarian_pengumuman($cari_pengumuman){
		$query="SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman AND pengumuman.judul_pengumuman LIKE '%$cari_pengumuman%'";
		return run($query);
	}

	function cariKBU($cari_user){
		$query="SELECT * FROM kelas WHERE id_guru = $cari_user";
		return run($query);
	}

	function editOrtu($id_ortu){
		$query = "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu AND ortu.id_ortu= $id_ortu and foto.id_murid = 0";
		return run($query);
	}

	function editGuru($id_guru){
		$query = "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru AND guru.id_guru= $id_guru and foto.id_murid = 0";
		return run($query);
	}

	function editMurid($id_murid){
		$query = "SELECT * FROM foto, murid WHERE foto.id_murid = murid.id_murid AND murid.id_murid= $id_murid";
		return run($query);
	}

	function editPengumuman($id_pengumuman){
		$query = "SELECT * FROM foto, pengumuman WHERE foto.id_pengumuman = pengumuman.id_pengumuman AND pengumuman.id_pengumuman= $id_pengumuman";
		return run($query);
	}
	function tampilEditjadwal($id_jadwal){
		$query = "SELECT * FROM jadwal WHERE id_jadwal = $id_jadwal";
		return run($query);
	}

	function tamJadguru($user_guru){
		$query = "SELECT DISTINCT mp.id_mp, kelas.id_kelas, mp.nama_mp, kelas.nama_kelas, ruang_kelas, tahun_ajaran FROM jadwal, mp, kelas WHERE jadwal.id_mp=mp.id_mp AND jadwal.id_kls=kelas.id_kelas AND id_guru_mp = $user_guru";
		return run($query);
	}
	
	function editKelas($id_kls){
		$query = "SELECT * FROM kelas, guru WHERE kelas.id_guru = guru.id_guru and kelas.id_kelas = $id_kls";
		return run($query);
	}

	function tamHarjadguru($user_guru, $id_mp, $id_kelas){
		$query = "SELECT DISTINCT hari FROM jadwal WHERE id_mp = $id_mp AND id_guru_mp= $user_guru AND id_kls= $id_kelas ORDER BY hari";
		return run($query);
	}

	function tamJamkelasguru($id_mp , $user_guru, $id_kelas, $hari){
		$query = "SELECT jam_masuk, jam_selesai FROM jadwal WHERE id_mp = $id_mp AND id_guru_mp= $user_guru AND id_kls=$id_kelas AND hari = '$hari' ORDER BY jam_masuk, jam_selesai, hari";
		return run($query);
	}

	function tampilMP(){
		$query = "SELECT * FROM mp ORDER BY ket_mp";
		return run($query);
	}

	function tamNaKegu($id_guru){
		$query = "SELECT DISTINCT nama_kelas FROM jadwal, kelas WHERE jadwal.id_kls = kelas.id_kelas AND id_guru_mp = $id_guru";
		return run($query);
	}

	function tamRuKegu($id_guru){
		$query = "SELECT DISTINCT ruang_kelas FROM jadwal, kelas WHERE jadwal.id_kls = kelas.id_kelas AND id_guru_mp = $id_guru";
		return run($query);
	}

	function tamTagu($id_guru){
		$query = "SELECT DISTINCT tahun_ajaran FROM jadwal, kelas WHERE jadwal.id_kls = kelas.id_kelas AND id_guru_mp = $id_guru";
		return run($query);
	}

	function tamNampgu($id_guru){
		$query = "SELECT DISTINCT nama_mp FROM jadwal, mp WHERE jadwal.id_mp = mp.id_mp AND id_guru_mp =$id_guru";
		return run($query);
	}

	function tampilKontak(){
		$query = "SELECT * FROM ortu ORDER BY nama_ortu";
		return run($query);
	}

	function tampilMpengajar($id_mp){
		$query = "SELECT * FROM mp WHERE id_mp = $id_mp";
		return run($query);
	}

	function tampilPengajar($id_mp){
		$query = "SELECT DISTINCT id_kls,id_guru_mp, id_mp FROM jadwal,kelas where jadwal.id_kls = kelas.id_kelas AND id_mp = $id_mp ORDER BY tahun_ajaran, nama_kelas, ruang_kelas";
		return run($query);
	}

	function tampilMper($id_mp){
		$query = "SELECT * FROM mp WHERE id_mp = $id_mp ORDER BY ket_mp";
		return run($query);
	}

	function adminNilai($filterKel){
		$query = "SELECT DISTINCT kelas.id_kelas, kelas.nama_kelas, kelas.ruang_kelas, kelas.tahun_ajaran,mp.id_mp, mp.nama_mp,guru.id_guru, guru.nama_guru FROM kelas, mp, guru, jadwal WHERE jadwal.id_kls=kelas.id_kelas AND jadwal.id_guru_mp=guru.id_guru AND jadwal.id_mp=mp.id_mp $filterKel order by nama_kelas, ruang_kelas, nama_mp";
		return run($query);
	}

	function admincekNilai($adminNilaiig, $filterSem, $adminNilaiik, $adminNilainmp){
		$query = "SELECT DISTINCT nilai.semester,nilai.id_guru_mp, kelas_siswa.id_kelas, nilai.nama_mapel FROM nilai, kelas_siswa WHERE nilai.id_ks = kelas_siswa.id_ks AND nilai.id_guru_mp= $adminNilaiig AND kelas_siswa.id_kelas=$adminNilaiik AND nilai.nama_mapel='$adminNilainmp' $filterSem";
		return run($query);
	}

	function tmadKelasnilai(){
		$query = "SELECT * FROM kelas ORDER BY nama_kelas, ruang_kelas, tahun_ajaran";
		return run($query);
	}

	function jumlahMurid($id_kelas){
		$query = "SELECT COUNT(*) AS jumlah_murid FROM kelas_siswa WHERE id_kelas = $id_kelas ";
		return run($query);
	}

	function tampilKelas(){
		$query = "SELECT * FROM kelas, guru WHERE kelas.id_guru = guru.id_guru";
		return run($query);
	}

	function tampilKelasbg($user_guru){
		$query = "SELECT * FROM kelas, guru WHERE kelas.id_guru = guru.id_guru AND kelas.id_guru = $user_guru";
		return run($query);
	}

	function tampilKelasag($user_guru){
		$query = "SELECT DISTINCT id_kls FROM jadwal WHERE id_guru_mp = $user_guru ORDER BY id_kls";
		return run($query);
	}

	function pengLain($id_pengumuman){
		$query = "SELECT * FROM pengumuman, foto WHERE pengumuman.id_pengumuman=foto.id_pengumuman AND pengumuman.id_pengumuman NOT IN ($id_pengumuman) ORDER BY RAND() LIMIT 5";
		return run($query);
	}

	function pengLain1(){
		$query = "SELECT * FROM pengumuman, foto WHERE pengumuman.id_pengumuman=foto.id_pengumuman ORDER BY RAND() LIMIT 3";
		return run($query);
	}

	function pengLain2(){
		$query = "SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru ORDER BY RAND() LIMIT 3";
		return run($query);
	}

	function pengLain3(){
		$query = "SELECT * FROM foto, murid WHERE foto.id_murid = murid.id_murid ORDER BY RAND() LIMIT 3";
		return run($query);
	}

	function tamLenguser(){
		$query = "SELECT * FROM user ORDER BY status_user, nama_pengguna";
		return run($query);
	}

	function tmplUSer($id_user){
		$query = "SELECT * FROM user WHERE id_user = $id_user";
		return run($query);
	}

	function tampilUser($nama_pengguna){
		$query = "SELECT * FROM user, guru WHERE user.nama_pengguna = guru.nama_guru AND guru.nama_guru = '$nama_pengguna'";
		return run($query);
	}

	function tampilUser_ortu($nama_pengguna){
		$query = "SELECT * FROM user, ortu WHERE user.nama_pengguna = ortu.nama_ortu AND ortu.nama_ortu = '$nama_pengguna'";
		return run($query);
	}

	function tampilFotouser($foto){
		$query = "SELECT * FROM foto WHERE id_foto = $foto";
		return run($query);
	}

	function tampilJadwalk($idklas){
		$query = "SELECT * FROM kelas WHERE id_kelas = $idklas ORDER BY nama_kelas, ruang_kelas";
		return run($query);
	}

	function tampilJadwalg(){
		$query = "SELECT * FROM guru ORDER BY nama_guru";
		return run($query);
	}

	function tampilJadwalmp(){
		$query = "SELECT * FROM mp ORDER BY nama_mp";
		return run($query);
	}

	function tampilJadleng($hari, $kela){
		$query = "SELECT * FROM jadwal, mp WHERE jadwal.id_mp = mp.id_mp AND jadwal.hari = '$hari' AND jadwal.id_kls = $kela ORDER BY jam_masuk, jam_selesai, hari";
		return run($query);
	}

	function tampilJadhari($id_kls){
		$query = "SELECT DISTINCT hari AS hari_jadwal FROM jadwal WHERE id_kls = $id_kls ORDER BY hari";
		return run($query);
	}

	function tampilGuru(){
		$query = "SELECT * FROM guru";
		return run($query);
	}
	function tampilAngkatan(){
		$query = "SELECT DISTINCT angkatan FROM murid ORDER BY angkatan ASC";
		return run($query);
	}

	function tampilMurAng($tahun_ajar){
		$query = "SELECT * FROM murid WHERE angkatan = '$tahun_ajar' ORDER BY angkatan ASC ";
		return run($query);
	}

	function tampilOrKontak(){
		$query = "SELECT DISTINCT nama_grup FROM grup_kontak";
		return run($query);
	}

	function tampilOrKontak2(){
		$query = "SELECT DISTINCT id_grup, nama_grup FROM grup_kontak";
		return run($query);
	}

	function  tampilData_ortu(){
		global $con;
		$id_last_query=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu ORDER BY  ortu.id_ortu DESC LIMIT 1"));
		$id_last = $id_last_query['id_ortu'];
		$query = "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu AND ortu.id_ortu != '$id_last' ORDER BY RAND() LIMIT 2";
		return run1($query);
	}

	function hasilPencarian($cari_ortu){
		$query="SELECT * FROM foto, ortu WHERE foto.id_foto = ortu.id_foto AND ortu.nama_ortu LIKE '%$cari_ortu%'";
		return run($query);
	}

	function tampilData_ortu_lengkap(){
		$query = "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu ORDER BY nama_ortu";
		return run($query);
	}

	function tampilData_ortu_last_id(){
		$query = "SELECT * FROM foto, ortu WHERE foto.id_ortu = ortu.id_ortu ORDER BY ortu.id_ortu DESC LIMIT 1";
		return run($query);
	}

	function tamJenisnilai(){
		$query = "SELECT * FROM jenis_nilai";
		return run($query);
	}
	function tamNileng($user_guru){
		$query = "SELECT DISTINCT kelas.id_kelas, kelas.nama_kelas, kelas.ruang_kelas, kelas.tahun_ajaran, nilai.semester, nilai.nama_mapel FROM nilai,kelas_siswa, kelas where nilai.id_ks= kelas_siswa.id_ks AND kelas_siswa.id_kelas=kelas.id_kelas AND nilai.id_guru_mp =$user_guru";
		return run($query);
	}

	function moonMur($id_kelas){
		$query = "SELECT * FROM murid, kelas_siswa WHERE murid.id_murid=kelas_siswa.id_murid and kelas_siswa.id_kelas = $id_kelas ";
		return run($query);
	}

	function tamNilaisi($id_ks, $idjn, $semester){
		$query = "SELECT * FROM nilai WHERE id_ks = $id_ks AND id_jenis_nilai=$idjn AND semester = $semester";
		return run($query);
	}

	function tamNilaisi2($id_ks, $idjn, $semester, $nama_mapel, $user_guru){
		$query = "SELECT * FROM nilai WHERE id_ks = $id_ks AND id_jenis_nilai=$idjn AND semester = $semester AND nama_mapel='$nama_mapel' AND id_guru_mp = $user_guru";
		return run($query);
	}

	function tamNilaisiOrtu($id_ks, $idjn, $semester, $nama_mapel){
		$query = "SELECT * FROM nilai WHERE id_ks = $id_ks AND id_jenis_nilai=$idjn AND semester = $semester AND nama_mapel='$nama_mapel'";
		return run($query);
	}

	function tamNilaisi3($id_ks, $idjn, $semester, $nama_mapel){
		$query = "SELECT * FROM nilai WHERE id_ks = $id_ks AND id_jenis_nilai=$idjn AND semester = $semester AND nama_mapel='$nama_mapel'";
		return run($query);
	}

	function tamMurgu($id_kelas){
		$query = "SELECT * FROM kelas, kelas_siswa WHERE kelas.id_kelas=kelas_siswa.id_kelas and kelas_siswa.id_kelas = $id_kelas ";
		return run($query);
	}

	function tamMurgulen($id_kelas){
		$query = "SELECT * FROM kelas, kelas_siswa, murid, foto Where kelas.id_kelas =kelas_siswa.id_kelas AND murid.id_murid = kelas_siswa.id_murid AND murid.id_murid=foto.id_murid AND kelas.id_kelas = $id_kelas";
		return run($query);
	}


	function hapusKelas($id_kelas){
		$query="DELETE FROM kelas WHERE id_kelas=$id_kelas;";
		$query .= "DELETE FROM kelas_siswa WHERE id_kelas=$id_kelas;";
		$query .= "DELETE FROM jadwal WHERE id_kls=$id_kelas";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus Kelas gagal");
		return $result;
	}

	function hapusMP($id_mp){
		$query="DELETE FROM mp WHERE id_mp=$id_mp;";
		$query .= "DELETE FROM jadwal WHERE id_mp=$id_mp";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus Kelas gagal");
		return $result;
	}

	function hapusGuru($id_guru){
		$query="DELETE FROM guru WHERE id_guru=$id_guru;";
		$query .= "DELETE FROM foto WHERE id_guru=$id_guru;";
		$query .= "DELETE FROM jadwal WHERE id_guru_mp=$id_guru;";
		$query .= "DELETE FROM kelas WHERE id_guru=$id_guru";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus murid gagal");
		return $result;
	}
	
	function hapusKon_Ortu($id_ortu){
		$query="DELETE FROM grup_kontak WHERE id_ortu=$id_ortu";
		return run($query);
	}

	function hapusPengajar($id_penajar, $id_mp, $id_kls){
		$query="DELETE FROM jadwal WHERE id_guru_mp = $id_penajar AND id_mp = $id_mp AND id_kls = $id_kls";
		return run($query);
	}

	function hpsGrp($nm_grup){
		$query="DELETE FROM grup_kontak WHERE nama_grup='$nm_grup'";
		return run($query);
	}

	function hapusJadwal($hapus_jadwal){
		$query="DELETE FROM jadwal WHERE id_jadwal= $hapus_jadwal";
		return run($query);
	}

	function hapusMuOr($id_murid,$id_ortu){
		$query ="DELETE FROM murid WHERE id_murid=$id_murid;";
		$query .= "DELETE FROM foto WHERE id_murid=$id_murid;";
		$query .="DELETE FROM ortu WHERE id_ortu=$id_ortu;";
		$query .= "DELETE FROM foto WHERE id_ortu=$id_ortu";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus ortu gagal");
		return $result;
	}

	function hapusMurid($id_murid){
		$query="DELETE FROM murid WHERE id_murid=$id_murid;";
		$query .= "DELETE FROM foto WHERE id_murid=$id_murid;";
		$query .= "DELETE FROM kelas_siswa WHERE id_murid=$id_murid";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus murid gagal");
		return $result;
	}

	function hapusOrtu($id_ortu){
		$query = "DELETE FROM foto WHERE id_ortu=$id_ortu;";
		$query .="DELETE FROM murid WHERE id_ortu=$id_ortu;";
		$query .= "DELETE FROM ortu WHERE id_ortu=$id_ortu";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query hapus gagal");
		return $result;
	}

	function hapusPengumuman($id_pengumuman){
		$query="DELETE FROM pengumuman WHERE id_pengumuman=$id_pengumuman;";
		$query .= "DELETE FROM foto WHERE id_pengumuman=$id_pengumuman";
		global $con;
		$result= mysqli_multi_query($con,$query) or die("query tampil gagal");
		return $result;
	}

	function hpGuru($cari_guru){
		$query="SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru AND guru.nama_guru LIKE '%$cari_guru%'";
		return run($query);
	}

	function hpGuru1($cari_guru){
		$query="SELECT * FROM foto, guru WHERE foto.id_guru = guru.id_guru AND guru.id_guru = $cari_guru";
		return run($query);
	}

	
	function jadTfg($id_guru){
		$query = "SELECT * FROM foto WHERE id_guru = $id_guru ";
		return run($query);
	}

	function AngKel($ik){
		$query = "SELECT * FROM murid, kelas_siswa where murid.id_murid = kelas_siswa.id_murid and kelas_siswa.id_kelas = $ik ORDER BY angkatan ASC ";
		return run($query);
	}

	function tanggalIndonesia($tgl){
		$bulan = array('01'=>'Januari','02'=>'Februari','03'=>'Maret','04'=>'April','05'=>'Mei','06'=>'Juni',
					'07'=>'Juli','08'=>'Agustus','09'=>'September','10'=>'Oktober','11'=>'November','12'=>'Desember');
		$pecah = explode('-', $tgl);
		$hari = $pecah[2];
		$bln = $pecah[1];
		$tahun = $pecah[0];

		return $hari.' '.$bulan[$bln].' '.$tahun;
	}
?>