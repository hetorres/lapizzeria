<?php

//Tablas personalizadas y otras funciones
require get_template_directory() . '/inc/database.php';

//Funciones para las reservaciones
require get_template_directory() . '/inc/reservaciones.php';

//Crar opciones para el Template
require get_template_directory() . '/inc/opciones.php';

function lapizzeria_setup() {
	add_theme_support('post-thumbnails');
	
	add_theme_support('title-tag');

    add_image_size('nosotros', 437, 291, true);

	add_image_size('especialidades', 768, 515, true);

	add_image_size('especialidades_portrait', 435, 526, true);
	
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);

  }
  add_action('after_setup_theme', 'lapizzeria_setup');



function lapizzeria_styles() {
    // REgistrar los estilos
    wp_register_style('normalize', get_template_directory_uri() . '/css/normalize.css', array(), '7.0.0');
    wp_register_style('google_fonts', 'https://fonts.googleapis.com/css?family=Merriweather:400,700,900|Montserrat:400,700,900|Open+Sans:400,700|Roboto:400,700,900');
	wp_register_style('fontawesome', get_template_directory_uri() . '/css/font-awesome.css', array('normalize'), '4.7.0');
	wp_register_style('fluidboxcss', get_template_directory_uri() . '/css/fluidbox.min.css', array('normalize'), '4.7.0');
    wp_register_style('style', get_template_directory_uri() . '/style.css', array('normalize'), '1.0');

    //Llamar a los estilos
    wp_enqueue_style('normalize');
    wp_enqueue_style('google_fonts');
	wp_enqueue_style('fontawesome');
	wp_enqueue_style('fluidboxcss');
    wp_enqueue_style('style');

	// REGISTRAR JS
	$apikey = esc_html(get_option('lapizzeria_gmap_apikey'));
	wp_register_script('maps', 'https://maps.googleapis.com/maps/api/js?key=' . $apikey . '&callback=initMap', array(), '', true);
	wp_register_script('fluidbox', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array(), '1.0.0', true);
    wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array(), '1.0.0', true);
	
	wp_enqueue_script('maps');
	wp_enqueue_script('jquery');
	wp_enqueue_script('fluidbox');
    wp_enqueue_script('scripts');
	

	// Pasar variables de PHP a JavaScript.
	wp_localize_script(
		'scripts',
		'opciones',
		array(
			'latitud' => get_option('lapizzeria_gmap_latitud'),
			'longitud' => get_option('lapizzeria_gmap_longitud'),
			'zoom' => get_option('lapizzeria_gmap_zoom'),
		)
	);

}

add_action('wp_enqueue_scripts', 'lapizzeria_styles');

// Utilizacion de JavaScripts en la pantalla de administrador.

function lapizzeria_admin_scripts(){
	wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin-ajax.js', array('jquery'), '1.0', true);

	//Pasar la URL de WP Ajax al adminjs
	wp_localize_script(
		'adminjs',
		'url_eliminar',
		array('ajaxurl'=> admin_url('admin-ajax.php'))
	);
}
add_action('admin_enqueue_scripts', 'lapizzeria_admin_scripts');






// Agregar ASYNC y DEFER
function agregar_async_defer($tag, $handle){
	if('maps' !== $handle)
		return $tag;
	return str_replace('src', 'async="async" defer="defer" src', $tag);
}

add_filter('script_loader_tag', 'agregar_async_defer', 10, 2);

//Creación de menus
function lapizzeria_menus(){
    register_nav_menus(array(
        'header-menu' => __('Header Menu', 'lapizzeria'),
        'social-menu' => __('Social Menu', 'lapizzeria')
        ));

}
add_action('init', 'lapizzeria_menus');

add_action( 'init', 'lapizzeria_especialidades' );
function lapizzeria_especialidades() {
	$labels = array(
		'name'               => _x( 'Pizzas', 'lapizzeria' ),
		'singular_name'      => _x( 'Pizzas', 'post type singular name', 'lapizzeria' ),
		'menu_name'          => _x( 'Pizzas', 'admin menu', 'lapizzeria' ),
		'name_admin_bar'     => _x( 'Pizzas', 'add new on admin bar', 'lapizzeria' ),
		'add_new'            => _x( 'Add New', 'book', 'lapizzeria' ),
		'add_new_item'       => __( 'Add New Pizza', 'lapizzeria' ),
		'new_item'           => __( 'New Pizzas', 'lapizzeria' ),
		'edit_item'          => __( 'Edit Pizzas', 'lapizzeria' ),
		'view_item'          => __( 'View Pizzas', 'lapizzeria' ),
		'all_items'          => __( 'All Pizzas', 'lapizzeria' ),
		'search_items'       => __( 'Search Pizzas', 'lapizzeria' ),
		'parent_item_colon'  => __( 'Parent Pizzas:', 'lapizzeria' ),
		'not_found'          => __( 'No Pizzases found.', 'lapizzeria' ),
		'not_found_in_trash' => __( 'No Pizzases found in Trash.', 'lapizzeria' )
	);

	$args = array(
		'labels'             => $labels,
    'description'        => __( 'Description.', 'lapizzeria' ),
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'especialidades' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 6,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
    'taxonomies'          => array( 'category' ),
	);

	register_post_type( 'especialidades', $args );
}

// WIDGETS

function lapizzeria_widgets(){
	register_sidebar(array(
		'name'			=>	'Blog Sidebar',
		'id'			=>	'blog_sidebar',
		'before_widget'	=>	'<div class="widget">',
		'after_widget'	=>	'</div>',
		'before_title'	=>	'<h3>',
		'after_title'	=>	'</h3>',
	));
}

add_action('widgets_init', 'lapizzeria_widgets');