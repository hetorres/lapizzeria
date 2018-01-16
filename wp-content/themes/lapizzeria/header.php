<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php wp_head(); ?>
</head>
<body>

    <header class="encabezado-sitio">
        <div class="contenedor">
            <div class="logo">
                <a href="<?php echo esc_url(home_url('/') ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="" class="logotipo">
                </a>
            </div><!-- cierre logo-->
            <div class="informacion-encabezado">
                <div class="redes-sociales">
                    <?php
                        $args = array(
                            'theme_location' => 'social-menu',
                            'container' => 'nav',
                            'container_class' => 'sociales',
                            'social_id' => 'sociales',
                            'link_before' => '<span class="sr-text">',
                            'link_after' => '</span>'
                        );
        
                        wp_nav_menu( $args ); 
                    ?>
                </div><!--cierre redes-sociales-->
                <div class="direccion">
                    <p>Paseo de la Rosaleda</p>
                    <p>Penonome, Panamá</p>
                </div>
            </div><!--cierre informacion-encabezadi-->

        </div><!--cierre contenedor-->
    </header>

    <div class="menu-principal">
        <div class="mobile-menu">
            <a href="#" class="mobile"><i class="fa fa-bars" aria-hidden="true"></i> Menu </a>
        </div>
    
    </div>


    <div class="contenedor navegacion">
        <?php
            $args = array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'container_class' => 'menu-sitio'
            );

            wp_nav_menu( $args );
        ?>
    </div><!--cierre contenedor navegacion-->
