<?php

function lapizzeria_guardar() {
    if(isset($_POST['enviar'])):
        echo "hOlaaaa";
    endif;
}

add_action('init', 'lapizzeria_guardar');
