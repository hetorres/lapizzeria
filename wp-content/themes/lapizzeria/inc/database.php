<?php

// INICIALIZA LA CREACION DE LAS TABLAS NUEVAS
function lapizzeria_database(){
    //WPDB NOS DA LOS METODOS PARA TRABAJAR CON TABLAS
    global $wpdb;
    global $lapizzeria_dbversion;
    $lapizzeria_dbversion = '1.0';

    //OBTENEMOS EL COLLATION DE LA INSTALACION
    $tabla = $wpdb->prefix . 'reservaciones';

    //AGREGAMOS LA ESTRUCTURA DE LA BASE DE DATOS
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $tabla (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            nombre varchar(50) NOT NULL,
            fecha date NOT NULL,
            hora time NOT NULL,
            correo varchar(50) DEFAULT '' NOT NULL,
            telefono varchar(10) NOT NULL,
            mensaje longtext NOT NULL,
            PRIMARY KEY (id)
    ) $charset_collate; ";

    //SE NECESITA dbEelta PARA EJECUTAR EL SQL Y ESTA EN LA SIGUIENTE DIRECCION
    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta( $sql );

    //AGREGAMOS LA VERSION DE LA BD PARA COMPARARLA CON FUTURAS ACTUALIZACIONES
    add_option( 'lapizzeria_dbversion', $lapizzeria_dbversion );


// ACTUALIZAR EN CASO DE SER NECESARIO
    $version_actual = get_option('lapizzeria_version');

    //COMPARAMOS LAS DOS VERSIONES
    if($lapizzeria_dbversion != $version_actual) {
        $tabla = $wpdb->prefix . 'reservaciones';

        //AQUI REALIZARIAS LAS ACTUALIZACIONES
        $sql = "CREATE TABLE $tabla (
                id mediumint(9) NOT NULL AUTO_INCREMENT,
                nombre varchar(50) NOT NULL,
                fecha date NOT NULL,
                hora time NOT NULL,
                correo varchar(50) DEFAULT '' NOT NULL,
                telefono varchar(10) NOT NULL,
                mensaje longtext NOT NULL,
                PRIMARY KEY (id)
        ) $charset_collate; ";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta( $sql );

        //ACTUALIAMOS A LA VERSION ACTUAL EN CASO DE QUE ASI SEA
        update_option('lapizzeria_dbversion', $lapizzeria_dbversion);
    }
}
add_action( 'after_setup_theme', 'lapizzeria_database' );

//FUNCION PARA COMPROBAR QUE LA VERSION INSTALADA ES IGUAL A LA BD NUEVA
function lapizzeria_revisar(){
    global $lapizzeria_dbversion;
    if(get_site_option('lapizzeria_dbversion') != $lapizzeria_dbversion) {
        lapizzeria_database();
    }
}

