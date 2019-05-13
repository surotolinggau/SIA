$(window).scroll(function(){

   var scroll = $(window).scrollTop();                
      
   if (scroll > 500 ) {
       $('#menu_fix').css("backgroundColor","#2E6688");
       $('#logo_tulisan').css("color","white");
       $('.kolom').css("color","white");
   }
  
    if (scroll <= 500 ) {
      $('#menu_fix').css("backgroundColor","white");;
      $('#logo_tulisan').css("color","#2E6688");
      $('.kolom').css("color","#2E6688");
    }
  
});


$(document).ready(function(){
  
  // Smooth scrolling to any internal tags
$('a[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top - 100
        }, 500);
        return false;
      }
    }
  });
  
});