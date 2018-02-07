$ = jQuery.noConflict();

$(document).ready(function(){

    // Ocultar y mostrar menu
    $('.mobile-menu a').on('click', function(){
        $('nav.menu-sitio').toggle('slow');
    });


    // Reaccionar a Rezise en la pantalla
    var breakpoint = 768;

    $(window).resize(function() {
        if($(document).width() >= breakpoint){
            $('nav.menu-sitio').show();
        } else {
            $('nav.menu-sitio').hide();
        }
    });

    // AJUSTAR CAJAS SEGUN TAMAÑO DE LA IMAGEN

    //ajustarCajas();

    // Fluidbox
    
    jQuery('.gallery a').each(function() {
        jQuery(this).attr({'data-fluidbox' : ''});
      });
      
      if(jQuery('[data-fluidbox]').length > 0) {
        jQuery('[data-fluidbox]').fluidbox();
      }
});