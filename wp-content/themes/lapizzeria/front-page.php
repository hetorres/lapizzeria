<?php get_header(); ?>

    <?php while(have_posts()): the_post(); ?>


        <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>">
            <div class="contenido-hero">
                <div class="texto-hero">
                    <h1><?php echo esc_html(get_option('blogdescription')); ?></h1>
                    <?php the_content( ); ?>

                    <?php $url = get_page_by_title('Sobre Nosotros'); ?>
                    <a class="button naranja" href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
                </div><!-- fin texto-hero -->
            </div><!-- fin contenido-hero -->
        </div><!-- fin hero -->
        <?php endwhile; ?>

        <div class="principal contenedor">
            <main class="contenedor-grid">
                <h2 class="rojo texto-centrado">Nuestras Especialidades</h2>
                <?php $args = array(
                    'posts_per_page' => 3,
                    'orderby' => 'rand',
                    'post_type' => 'especialidades',
                    'category_name' => 'pizzas'
                );

                $especialidades = new WP_Query($args);
                while($especialidades->have_posts()): $especialidades->the_post();
                ?>

                <div class="especialidad columnas1-3">
                    <div class="contenido-especialidad">
                        <?php the_post_thumbnail('especialidades_portrait'); ?>
                        <div class="informacion-platillo">
                            <h3><?php the_title(); ?></h3>
                            <?php the_content(); ?>
                            <p class="precio">$<?php the_field('precio'); ?></p>
                            <a href="<?php the_permalink(); ?>" class="button">Leer más</a>
                        </div><!-- Fin informacion-platillo -->
                    </div><!-- Fin contenido-especialidad -->
                </div><!--Fin especialidad-->

                <?php endwhile; wp_reset_postdata(); ?>
            </main><!-- fin contenedor-grid -->
        </div><!-- fin principal -->

        <section class="ingredientes">
            <div class="contenedor">
                <div class="contenedor-grid">
                    <?php while(have_posts()): the_post(); ?>
                    <div class="columnas2-4">
                        <?php the_field('contenido'); ?>
                        <?php $url = get_page_by_title('Sobre Nosotros'); ?>
                        <a class="button naranja" href="<?php echo get_permalink($url->ID); ?>">Leer más</a>
                    </div><!-- fin columnas2-4 -->
                    <div class="columnas2-4 imagen">
                        <img src="<?php the_field('imagen'); ?>">
                    </div><!-- fin columnas2-4 -->
                    <?php endwhile; ?>
                </div><!--fin contenedor-grid -->
            </div><!-- fin contenedor -->
        </section><!-- fin ingredientes -->

        <section class="contenedor">
            <h2 class="texto-rojo texto-centrado">Galería de Imágenes</h2>
            <?php $url = get_page_by_title('Galería'); ?>
            <?php echo get_post_gallery($url->ID); ?>
        </section><!-- Fin contenedor Galeria -->

        <section class="ubicacion-reservacion">
            <div class="contenedor-grid">
                <div class="columnas2-4">
                    <div id="mapa"></div>
                </div><!-- fin columnas2-4 -->
                <div class="columnas2-4">
                    <?php get_template_part('templates/formulario', 'reservacion'); ?>
                </div><!-- fin columnas2-4 -->
            </div><!-- Fin contenedor grid -->
        </section><!-- Fin ubicacion-reservacion -->



<?php get_footer(  ); ?>