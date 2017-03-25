<?php
/**
 * Go Country Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Go_Country_Theme
 */

if ( ! function_exists( 'co_country_theme_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function co_country_theme_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Go Country Theme, use a find and replace
	 * to change 'co-country-theme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'co-country-theme', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'menu-1' => esc_html__( 'Primary', 'co-country-theme' ),
	) );
	register_nav_menus( array(
		'menu-2' => esc_html__( 'Footer', 'co-country-theme' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'co_country_theme_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif;
add_action( 'after_setup_theme', 'co_country_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function co_country_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'co_country_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'co_country_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function co_country_theme_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'co-country-theme' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'co-country-theme' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	// Register each footer widget
	$x = 1;
	while( $x <= 4) {
		$footerName = 'Footer '.$x;
		$footerID = 'footer-'.$x;
	    register_sidebar( array(
	    	'name'          => esc_html__( $footerName, 'co-country-theme' ),
	    	'id'            => $footerID,
	    	'description'   => esc_html__( 'Add widgets here.', 'co-country-theme' ),
	    	'before_widget' => '<section id="%1$s" class="widget %2$s">',
	    	'after_widget'  => '</section>',
	    	'before_title'  => '<h2 class="widget-title">',
	    	'after_title'   => '</h2>',
	    ) );
	    $x++;
	} 	
}
add_action( 'widgets_init', 'co_country_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function co_country_theme_scripts() {
	wp_enqueue_style( 'co-country-theme-style', get_stylesheet_uri() );

	wp_enqueue_script( 'co-country-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'co-country-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	wp_enqueue_script( 'co-country-theme-jquery', get_template_directory_uri() . '/js/jquery-3.2.0.min.js', array( 'jquery' ), '3.2.0', true );

	wp_enqueue_script( 'co-country-theme-functions', get_template_directory_uri() . '/js/functions.js', array(), '1.0.0', true );

	add_action( 'wp_enqueue_scripts', 'my_theme_scripts' );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'co_country_theme_scripts' );

/**
 * Fix jQuery Gravity Forms
 */
add_filter("gform_init_scripts_footer", "init_scripts");
	function init_scripts() {
	return true;
}

/**
 * Enqueue google fonts.
 */
function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css?family=Ubuntu:300,500,700', false );
}
add_action( 'wp_enqueue_scripts', 'wpb_add_google_fonts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Load Jetpack compatibility file.
 */

if ( ! function_exists( 'passeios_turisticos_vantagens' ) ) {

/**
 * Register CT - Passeios Turisticos - Vantagens
 */
function passeios_turisticos_vantagens() {

	$labels = array(
		'name'                       => _x( 'Vantagens', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Vantagem', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Vantagens', 'text_domain' ),
		'all_items'                  => __( 'Todas', 'text_domain' ),
		'new_item_name'              => __( 'Nova vantagem', 'text_domain' ),
		'add_new_item'               => __( 'Adicionar vantagem', 'text_domain' ),
		'add_or_remove_items'        => __( 'Adicionar ou remover vantagens', 'text_domain' ),
		'search_items'               => __( 'Pesquisar vantagens', 'text_domain' ),
		'not_found'                  => __( 'Nenhuma vantagem encontrada', 'text_domain' ),
		'no_terms'                   => __( 'Nenhuma vantagem', 'text_domain' ),
		'items_list'                 => __( 'Lista de vantagens', 'text_domain' ),
		'items_list_navigation'      => __( 'Navegação lista de vantagens', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'passeios_turisticos_vantagens', array( 'passeios_turisticos' ), $args );

}
add_action( 'init', 'passeios_turisticos_vantagens', 0 );

}


if ( ! function_exists('passeios_turisticos') ) {

/**
 * Register CPT - Passeios Turisticos
 */
function passeios_turisticos() {

	$labels = array(
		'name'                  => _x( 'Passeios Turísticos', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Passeio Turístico', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Passeios Turísticos', 'text_domain' ),
		'name_admin_bar'        => __( 'Passeios Turísticos', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Passeio Turístico', 'text_domain' ),
		'description'           => __( 'Registrar novos passeios', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-palmtree',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'passeios_turisticos', $args );

}
add_action( 'init', 'passeios_turisticos', 0 );

}


if ( ! function_exists('suporte') ) {
/**
 * Register CPT - Suporte
 */
function suporte() {

	$labels = array(
		'name'                  => _x( 'Suporte', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Suporte', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Suporte', 'text_domain' ),
		'name_admin_bar'        => __( 'Suporte', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Suporte', 'text_domain' ),
		'description'           => __( 'Registrar faqs etc', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'            => array( 'category' ),
		'hierarchical'          => true,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-editor-help',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'suporte', $args );

}
add_action( 'init', 'suporte', 0 );

}

/**
 * Search to Passeios Turísticos
 */
function tax_search_join($join) {
	global $wpdb;
	if(is_search()) {
		$join .= "
		INNER JOIN
		{$wpdb->term_relationships} ON {$wpdb->posts}.ID = {$wpdb->term_relationships}.object_id
		INNER JOIN
		{$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = {$wpdb->term_relationships}.term_taxonomy_id
		INNER JOIN
		{$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
		";
	}
	return $join;
}
add_filter('posts_join', 'tax_search_join');

function tax_search_where($where) {
	global $wpdb;
	if(is_search()) {
		$where .= " OR
		(
		{$wpdb->term_taxonomy}.taxonomy LIKE 'passeios_turisticos'
		AND
		{$wpdb->terms}.name LIKE ('%".$wpdb->escape( get_query_var('s') )."%')
		) ";
	}
	return $where;
}
add_filter('posts_where', 'tax_search_where');

function tax_search_groupby($groupby) {
	global $wpdb;
	if(is_search()) {
		$groupby = "{$wpdb->posts}.ID";
	}
	return $groupby;
}
add_filter('posts_groupby', 'tax_search_groupby');


/**
 * Fix excerpt
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 16;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );

function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );