<?php
/**
 * AlexCuar Pro functions and definitions.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

define( 'ALEXCUAR_PRO_VERSION', '2.3.0' );

require_once get_template_directory() . '/inc/icons.php';
require_once get_template_directory() . '/inc/template-tags.php';
require_once get_template_directory() . '/inc/customizer.php';
require_once get_template_directory() . '/inc/cv-data.php';
require_once get_template_directory() . '/inc/github.php';
require_once get_template_directory() . '/inc/illustrations.php';

function alexcuar_pro_setup(): void {
	load_theme_textdomain( 'alexcuar-pro', get_template_directory() . '/languages' );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'editor-styles' );
	add_theme_support( 'customize-selective-refresh-widgets' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script', 'navigation-widgets' ) );
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 80,
			'width'       => 80,
			'flex-height' => true,
			'flex-width'  => true,
		)
	);

	add_editor_style( 'assets/editor-style.css' );

	add_image_size( 'alexcuar-card', 768, 432, true );
	add_image_size( 'alexcuar-hero', 1600, 900, true );

	register_nav_menus(
		array(
			'primary' => __( 'Menú principal', 'alexcuar-pro' ),
			'footer'  => __( 'Menú del pie', 'alexcuar-pro' ),
		)
	);
}
add_action( 'after_setup_theme', 'alexcuar_pro_setup' );

function alexcuar_pro_content_width(): void {
	$GLOBALS['content_width'] = 760;
}
add_action( 'after_setup_theme', 'alexcuar_pro_content_width', 0 );

function alexcuar_pro_widgets_init(): void {
	$defaults = array(
		'before_widget' => '<section id="%1$s" class="widget footer-widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	);

	for ( $i = 1; $i <= 3; $i++ ) {
		register_sidebar(
			array_merge(
				$defaults,
				array(
					/* translators: %d: footer column number. */
					'name' => sprintf( __( 'Pie – columna %d', 'alexcuar-pro' ), $i ),
					'id'   => 'footer-' . $i,
				)
			)
		);
	}
}
add_action( 'widgets_init', 'alexcuar_pro_widgets_init' );

function alexcuar_pro_scripts(): void {
	wp_enqueue_style( 'alexcuar-pro-style', get_stylesheet_uri(), array(), ALEXCUAR_PRO_VERSION );
	wp_enqueue_script( 'alexcuar-pro-main', get_template_directory_uri() . '/assets/js/main.js', array(), ALEXCUAR_PRO_VERSION, array( 'strategy' => 'defer', 'in_footer' => true ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'alexcuar_pro_scripts' );

/**
 * WHY: aplicar el tema guardado y la clase "js" antes del primer pintado evita parpadeos y oculta las animaciones de entrada solo si hay JS.
 */
function alexcuar_pro_theme_preload(): void {
	echo "<script>(function(d){d.className+=' js';try{var t=localStorage.getItem('alexcuar-theme');if(t==='dark'||t==='light'){d.setAttribute('data-theme',t);}}catch(e){}})(document.documentElement);</script>\n";
	foreach ( array( 'inter-latin', 'space-grotesk-latin' ) as $font ) {
		printf( '<link rel="preload" href="%s" as="font" type="font/woff2" crossorigin>' . "\n", esc_url( get_template_directory_uri() . '/assets/fonts/' . $font . '.woff2' ) );
	}
	echo '<meta name="theme-color" content="#07080f">' . "\n";
}
add_action( 'wp_head', 'alexcuar_pro_theme_preload', 1 );

function alexcuar_pro_pingback_header(): void {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'alexcuar_pro_pingback_header' );

function alexcuar_pro_excerpt_length(): int {
	return 28;
}
add_filter( 'excerpt_length', 'alexcuar_pro_excerpt_length', 999 );

function alexcuar_pro_excerpt_more(): string {
	return '…';
}
add_filter( 'excerpt_more', 'alexcuar_pro_excerpt_more', 999 );

function alexcuar_pro_archive_title_prefix(): string {
	return '';
}
add_filter( 'get_the_archive_title_prefix', 'alexcuar_pro_archive_title_prefix' );

function alexcuar_pro_body_classes( array $classes ): array {
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}
	return $classes;
}
add_filter( 'body_class', 'alexcuar_pro_body_classes' );

/**
 * WHY: GP Premium (plugin de GeneratePress) sigue activo tras cambiar de tema e inyecta columnas, extractos y estilos propios que rompen la rejilla.
 */
function alexcuar_pro_strip_foreign_post_classes( array $classes ): array {
	return array_values(
		array_filter(
			$classes,
			static function ( string $class_name ): bool {
				return ! preg_match( '/^(generate-columns|grid-parent|infinite-scroll-item|masonry-post|(tablet-|mobile-)?grid-\d+)$/', $class_name );
			}
		)
	);
}
add_filter( 'post_class', 'alexcuar_pro_strip_foreign_post_classes', 999 );

function alexcuar_pro_dequeue_generatepress_assets(): void {
	foreach ( array( wp_styles(), wp_scripts() ) as $registry ) {
		foreach ( $registry->queue as $handle ) {
			$src = $registry->registered[ $handle ]->src ?? '';
			if ( is_string( $src ) && false !== strpos( $src, '/plugins/gp-premium/' ) ) {
				$registry instanceof WP_Styles ? wp_dequeue_style( $handle ) : wp_dequeue_script( $handle );
			}
		}
	}
}
add_action( 'wp_enqueue_scripts', 'alexcuar_pro_dequeue_generatepress_assets', 999 );
