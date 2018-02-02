
    <footer>
        <?php
            $args = array(
                'theme_location' => 'header-menu',
                'container' => 'nav',
                'after' => '<span class="separador"> | </span>'
            );
            wp_nav_menu( $args );
        ?>
        <div class="ubicacion">
            <p>Paseo de la Rosaleda</p>
            <p>Penonome, Panamá</p>
        </div>
        <p class="copyright">Todos los derechos reservado <?php echo date('Y') ?></p>


    </footer>
  
    <?php wp_footer( ); ?>
    </body>
</html>