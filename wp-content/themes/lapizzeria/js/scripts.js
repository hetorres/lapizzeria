var ma;
function initMap(){
    map = new google.maps.Map(document.getElementById('mapa'),{
        center: {lat:8.515237, lng:-80.350401},
        zoom: 16
    });
}


$ = jQuery.noConflict();

$(document).ready(function(){

    // Ocultar y mostrar menu
    $('.mobile-menu a').on('click', function(){
        $('nav.menu-sitio').toggle('slow');
    });


    // Reaccionar a Rezise en la pantalla
    var breakpoint = 768;
    $(window).resize(function() {
        ajustarCajas();
        if($(document).width() >= breakpoint){
            $('nav.menu-sitio').show();
        } else {
            $('nav.menu-sitio').hide();
        }
    });

    // AJUSTAR CAJAS SEGUN TAMAÑO DE LA IMAGEN

    ajustarCajas();


    //Ajustar Mapa
    var mapa =$('#mapa');
    if(mapa.length > 0){
        if($(document).width() >= breakpoint){
            ajustarMapa(0);
        } else {
            ajustarMapa(300);
        }
    }

    $(windows).resize(function(){
        if($(document).width() >= breakpoint){
            ajustarMapa(0);
        } else {
            ajustarMapa(300);
        }
    });



    // Fluidbox
    
    jQuery('.gallery a').each(function() {
        jQuery(this).attr({'data-fluidbox' : ''});
      });
      
      if(jQuery('[data-fluidbox]').length > 0) {
        jQuery('[data-fluidbox]').fluidbox();
      }
});

function ajustarCajas(){
    var imagenes = $('.imagen-caja');
    if(imagenes.length > 0){
        var altura = imagenes[0].height;
        var cajas = $('div.contenido-caja');
        $(cajas).each(function(i, elemento){
            $(elemento).css({'height' : altura +'px'});
        });
    }
}

function ajustarMapa(altura){
    if(altura == 0){
        var ubicacionSection = $('.ubicacion-reservacion');
        var ubicacionAltura = ubicacionSection.height();
        $('#mapa').css({'height': ubicacionAltura});
    } else {
        $('#mapa').css({'height': altura});
    }
}