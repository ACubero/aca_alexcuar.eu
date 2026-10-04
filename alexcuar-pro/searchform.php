<?php
/**
 * Search form.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$field_id = wp_unique_id( 'search-field-' );
?>
<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text" for="<?php echo esc_attr( $field_id ); ?>"><?php esc_html_e( 'Buscar:', 'alexcuar-pro' ); ?></label>
	<input type="search" id="<?php echo esc_attr( $field_id ); ?>" class="search-field" placeholder="<?php esc_attr_e( 'Buscar artículos…', 'alexcuar-pro' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s">
	<button type="submit" class="search-submit"><?php esc_html_e( 'Buscar', 'alexcuar-pro' ); ?></button>
</form>
