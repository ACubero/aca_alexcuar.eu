<?php
/**
 * Footer.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

?>
<footer class="site-footer">
	<div class="container">
		<p class="footer-giant" aria-hidden="true"><?php echo esc_html( alexcuar_pro_footer_giant() ); ?></p>
		<div class="footer-grid">
			<div class="footer-brand">
				<?php get_template_part( 'template-parts/brand' ); ?>
				<?php $footer_about = alexcuar_pro_option( 'footer_about' ); ?>
				<?php if ( $footer_about ) : ?>
					<p><?php echo esc_html( $footer_about ); ?></p>
				<?php endif; ?>
				<?php alexcuar_pro_social_links(); ?>
			</div>
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<?php if ( is_active_sidebar( 'footer-' . $i ) ) : ?>
					<div class="footer-column"><?php dynamic_sidebar( 'footer-' . $i ); ?></div>
				<?php endif; ?>
			<?php endfor; ?>
		</div>

		<div class="footer-bottom">
			<p><?php echo alexcuar_pro_footer_copyright(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped in helper. ?></p>
			<?php if ( has_nav_menu( 'footer' ) ) : ?>
				<nav class="footer-menu" aria-label="<?php esc_attr_e( 'Pie', 'alexcuar-pro' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'footer',
							'container'      => false,
							'depth'          => 1,
						)
					);
					?>
				</nav>
			<?php endif; ?>
		</div>
	</div>
</footer>

<button class="icon-button back-to-top" type="button" aria-label="<?php esc_attr_e( 'Volver arriba', 'alexcuar-pro' ); ?>"><?php alexcuar_pro_icon( 'arrow-up' ); ?></button>

<?php wp_footer(); ?>
</body>
</html>
