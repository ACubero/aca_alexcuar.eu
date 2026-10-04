<?php
/**
 * Archive template (categories, tags, dates, authors).
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

get_header();

if ( is_category() ) {
	$eyebrow = __( 'Categoría', 'alexcuar-pro' );
} elseif ( is_tag() ) {
	$eyebrow = __( 'Etiqueta', 'alexcuar-pro' );
} elseif ( is_author() ) {
	$eyebrow = __( 'Autor', 'alexcuar-pro' );
} else {
	$eyebrow = __( 'Archivo', 'alexcuar-pro' );
}

get_template_part(
	'template-parts/page-hero',
	null,
	array(
		'eyebrow'     => $eyebrow,
		'title'       => get_the_archive_title(),
		'description' => get_the_archive_description(),
		'pills'       => is_category(),
	)
);

get_template_part( 'template-parts/loop' );

get_footer();
