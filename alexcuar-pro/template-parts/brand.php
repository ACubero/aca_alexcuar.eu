<?php
/**
 * Brand block (logo + site name + tagline), shared by header and footer.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$brand_tagline = alexcuar_pro_brand_tagline();
?>
<a class="brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
	<?php if ( has_custom_logo() ) : ?>
		<?php echo wp_get_attachment_image( (int) get_theme_mod( 'custom_logo' ), 'thumbnail', false, array( 'class' => 'custom-logo', 'alt' => '' ) ); ?>
	<?php else : ?>
		<span class="brand__mark" aria-hidden="true"><?php echo esc_html( alexcuar_pro_brand_initials() ); ?></span>
	<?php endif; ?>
	<span class="brand__name"><?php bloginfo( 'name' ); ?><?php if ( $brand_tagline ) : ?><small><?php echo esc_html( $brand_tagline ); ?></small><?php endif; ?></span>
</a>
