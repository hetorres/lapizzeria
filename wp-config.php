<?php
/** 
 * Configuración básica de WordPress.
 *
 * Este archivo contiene las siguientes configuraciones: ajustes de MySQL, prefijo de tablas,
 * claves secretas, idioma de WordPress y ABSPATH. Para obtener más información,
 * visita la página del Codex{@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} . Los ajustes de MySQL te los proporcionará tu proveedor de alojamiento web.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

// ** Ajustes de MySQL. Solicita estos datos a tu proveedor de alojamiento web. ** //
/** El nombre de tu base de datos de WordPress */
define('DB_NAME', 'lapizzeria');

/** Tu nombre de usuario de MySQL */
define('DB_USER', 'root');

/** Tu contraseña de MySQL */
define('DB_PASSWORD', 'h8t10p60');

/** Host de MySQL (es muy probable que no necesites cambiarlo) */
define('DB_HOST', 'localhost');

/** Codificación de caracteres para la base de datos. */
define('DB_CHARSET', 'utf8mb4');

/** Cotejamiento de la base de datos. No lo modifiques si tienes dudas. */
define('DB_COLLATE', '');

/**#@+
 * Claves únicas de autentificación.
 *
 * Define cada clave secreta con una frase aleatoria distinta.
 * Puedes generarlas usando el {@link https://api.wordpress.org/secret-key/1.1/salt/ servicio de claves secretas de WordPress}
 * Puedes cambiar las claves en cualquier momento para invalidar todas las cookies existentes. Esto forzará a todos los usuarios a volver a hacer login.
 *
 * @since 2.6.0
 */
define('AUTH_KEY', 'G3O0ofyDHj8d=|2g`1Y{n@^E~}S*<SKM@Z:*rP;YM7z!JQ=X+!bDD~KcBmAM5U3B');
define('SECURE_AUTH_KEY', 'OfhabVh81&1X5@BbRjEW8EW2Wxr-,UdRa-<E#OEw2`$^<-:k0GV**UU%&|0i_]$x');
define('LOGGED_IN_KEY', 'AS%7_*OFV4?hU&*c9f,^*gl*3?`7.ptB>)VpjZR5}ys(IMXcw4n$uwY!Kah@)K.9');
define('NONCE_KEY', '}6Go;]6PQUcrn$MqQ?xbEhuJ:|BNUhVvz:n|4n)ALp~Sp} N6t!4$Oj4DD/bJ>Ib');
define('AUTH_SALT', 'gp)NIPt_f]KNam$Pp1fd1(;(bayr2w>j(+~|4zV?5GjR3n.<X[C#<PW8oc31tA6f');
define('SECURE_AUTH_SALT', 'j]^|YmCoNPA=/tK#}1cHS:_]tS=WS{A&diP+8{uvi21Apq{SENgHl|`vhgy[,W.t');
define('LOGGED_IN_SALT', 'H&(o7=,P`N?K+.N[co3w1Lwh$aO9XnEpNvEe_yucC9nUu>S9+#+W;i2{&;oQ=(:|');
define('NONCE_SALT', 'ITdK11-^j;>RG~1Zs`O*F4KR||;/eP`Jh8%~f3>8?IU:!L;[zfA0O 9Hp7;)MAq ');

/**#@-*/

/**
 * Prefijo de la base de datos de WordPress.
 *
 * Cambia el prefijo si deseas instalar multiples blogs en una sola base de datos.
 * Emplea solo números, letras y guión bajo.
 */
$table_prefix  = 'wp_';


/**
 * Para desarrolladores: modo debug de WordPress.
 *
 * Cambia esto a true para activar la muestra de avisos durante el desarrollo.
 * Se recomienda encarecidamente a los desarrolladores de temas y plugins que usen WP_DEBUG
 * en sus entornos de desarrollo.
 */
define('WP_DEBUG', true);

/* ¡Eso es todo, deja de editar! Feliz blogging */

/** WordPress absolute path to the Wordpress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');

