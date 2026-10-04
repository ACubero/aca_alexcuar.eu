<?php
/**
 * No results.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;
?>
<section class="no-results">
	<h2><?php esc_html_e( 'Nada por aquí… todavía', 'alexcuar-pro' ); ?></h2>
	<?php if ( is_search() ) : ?>
		<p><?php esc_html_e( 'No hay resultados para tu búsqueda. Prueba con otras palabras.', 'alexcuar-pro' ); ?></p>
	<?php else : ?>
		<p><?php esc_html_e( 'No se ha encontrado contenido. Prueba a buscar.', 'alexcuar-pro' ); ?></p>
	<?php endif; ?>
	<?php get_search_form(); ?>
</section>
