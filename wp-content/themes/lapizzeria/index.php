<?php get_header(); ?>

    <?php
        $pagina_blog = get_option('page_for_posts');
        $imagen = get_post_thumbnail_id($pagina_blog);
        $imagen = wp_get_attachment_image_src( $imagen, 'full' );
    
    ?>


        <div class="hero" style="background-image:url(<?php echo $imagen[0]; ?>">
            <div class="contenido-hero">
                <div class="texto-hero">
                    <h1><?php echo get_the_title( $pagina_blog ); ?></h1>
                </div><!-- texto-hero -->
            </div><!-- contenido-hero -->
        </div><!-- hero -->

        <div class="principal contenedor">
            <div class="contenedor-grid">
                <main class="columnas2-3 contenido-paginas">

                    <?php while(have_posts()): the_post(); ?>
                        <article class="entrada-blog">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail( 'especialidades' ); ?>
                            </a>
                        
                            <header class="informacion-entrada clear">
                                <div class="fecha">
                                    <time>
                                        <?php echo the_time('d'); ?>
                                        <span><?php the_time('M'); ?></span>
                                    </time>
                                </div><!-- fecha -->
                                <div class="titulo-entrada">
                                    <?php the_title('<h2>', '</h2>'); ?>

                                    <p class="autor">
                                        <i class="fa fa-user" aria-hiden="true"> </i>
                                        <?php the_author(); ?>
                                    </p>
                                </div><!-- titulo entrada -->

                            </header><!-- informacion-entrada -->
                            <div class="contenido-entrada">
                                <?php the_excerpt(); ?>
                                <a href="<?php the_permalink(); ?>" class="button">Leer más</a>
                            </div><!-- contenido entrada -->
                        </article><!-- entrada-blog -->
                    <?php endwhile; ?>

                    <div class="paginacion">
                        <?php //echo paginate_links(); ?>
                        <div class="anteriores">
                            <?php next_posts_link('Anteriores'); ?>
                        </div><!-- anteriores -->
                        <div class="siguientes">
                            <?php previous_post_link('Siguientes'); ?>
                        </div><!-- siguientes -->
                    </div><!-- paginacion -->

                    
                </main><!-- columnas2-3 -->
                <?php get_sidebar(); ?>
            </div><!-- .contenedor grid -->
        </div><!-- principal contenedor -->


<?php get_footer(  ); ?>