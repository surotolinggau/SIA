function pilih(chk){
	if(document.form_kontak_ortu.pilih_semua.checked==true){
		for(i=0; i<chk.length; i++)
			chk[i].checked=true;
	}else{
		for(i=0; i<chk.length; i++)
			chk[i].checked=false;
	}
}
 
function toggleMenu(){
var menu = document.getElementById('iden_kontak');
menu.classList.toggle('muncul_kontak');
}

function toggleMenu2(){
var menu = document.getElementById('iden_nilai');
menu.classList.toggle('muncul_nilai');
}

function toggleMenu1(){
var menu1 = document.getElementById('iden_kon');
menu1.classList.toggle('muncul_kon');
var menu1 = document.getElementById('iden_kon_l');
menu1.classList.toggle('muncul_tmbl');
}

function pilihKontak() {
	var kontak_ortu = document.form_kontak_ortu;
    var txt = "";
    var i;
    for (i = 0; i < kontak_ortu.length-4; i++) {
    	if(i< kontak_ortu.length-4){
	        if (kontak_ortu[i].checked) {
	            txt =  txt + kontak_ortu[i].value + ", ";
	        }
	}
}
	document.getElementById("no_hp").value =  txt ;
}