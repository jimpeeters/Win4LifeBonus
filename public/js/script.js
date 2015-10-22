$( document ).ready(function() {

       $(".btnCodeIngeven").click(function() {
        $('html, body').animate({
            scrollTop: $(".content-section-a").offset().top
        }, 2000);
    });
        
    $(".btnInstructies").click(function() {
        $('html, body').animate({
            scrollTop: $(".content-section-b").offset().top
        }, 2000);
    });


  $('body,html').bind('scroll mousedown wheel DOMMouseScroll mousewheel keyup', function(e){
     if ( e.which > 0 || e.type == "mousedown" || e.type == "mousewheel"){
      $("html,body").stop();
     }
    });
  
});