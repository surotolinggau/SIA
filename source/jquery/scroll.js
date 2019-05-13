
//smoothScrool

var posY = 0;
var jarak = 10;
function smoothScrool(id){
	var target = document.getElementById(id).offsetTop;//jarak antara atas dan div

	var scrollAnimate = setTimeout(function(){
		smoothScrool(id);
	}, 1) //Fungsi dan waktu

	posY = posY + jarak;
//berhenti pada bagian tertentu
	if(posY >= target){
		clearTimeout(scrollAnimate);
		posY = 0;
	}else{
		window.scroll(0,posY); //x dan y
	}
	return false;
}