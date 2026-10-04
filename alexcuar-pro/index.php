<?php
/**
 * Blog index.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow'     => __( 'Blog', 'alexcuar-pro' ),
		'title'       => is_home() && ! is_front_page() ? single_post_title( '', false ) : __( 'Artículos', 'alexcuar-pro' ),
		'description' => esc_html__( 'Historias sobre tecnología, productividad, IA y todo lo que voy aprendiendo.', 'alexcuar-pro' ),
		'pills'       => true,
	)
);

get_template_part( 'template-parts/loop' );

get_footer();
