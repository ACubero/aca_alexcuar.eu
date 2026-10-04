<?php
/**
 * Search results.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

get_header();

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow' => __( 'Búsqueda', 'alexcuar-pro' ),
		/* translators: %s: search query. */
		'title'   => sprintf( esc_html__( 'Resultados para «%s»', 'alexcuar-pro' ), '<span class="text-gradient">' . esc_html( get_search_query() ) . '</span>' ),
	)
);

get_template_part( 'template-parts/loop' );

get_footer();
