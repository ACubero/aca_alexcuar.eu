<?php
/**
 * 404.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
<main id="primary" class="site-main page-hero">
	<?php alexcuar_pro_aurora(); ?>
	<section class="container container--narrow error-404">
		<p class="error-404__code text-gradient" data-reveal="zoom">404</p>
		<h1 data-reveal style="--reveal-delay:100"><?php esc_html_e( 'Esta página se ha perdido', 'alexcuar-pro' ); ?></h1>
		<p data-reveal style="--reveal-delay:180"><?php esc_html_e( 'El contenido que buscas no existe o ha cambiado de dirección.', 'alexcuar-pro' ); ?></p>
		<p data-reveal style="--reveal-delay:260"><a class="btn" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php esc_html_e( 'Volver al inicio', 'alexcuar-pro' ); ?></a></p>
		<?php get_search_form(); ?>
	</section>
</main>
<?php
get_footer();
