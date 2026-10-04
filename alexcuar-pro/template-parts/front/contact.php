<?php
/**
 * Contact call to action.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$contact_url = alexcuar_pro_contact_url();
$linkedin    = alexcuar_pro_option( 'social_linkedin' );
$cv_url      = alexcuar_pro_option( 'cv_url' );
?>
<section class="section" id="contacto" style="padding-top:0">
	<div class="container">
		<div class="cta" data-reveal="zoom">
			<p class="eyebrow"><?php esc_html_e( 'Contacto', 'alexcuar-pro' ); ?></p>
			<h2 class="cta__title"><?php echo esc_html( alexcuar_pro_option( 'cta_title' ) ); ?></h2>
			<p class="cta__text"><?php echo esc_html( alexcuar_pro_option( 'cta_text' ) ); ?></p>
			<div class="cta__actions">
				<?php if ( $contact_url ) : ?>
					<a class="btn btn--lg" data-magnetic href="<?php echo esc_url( $contact_url ); ?>"><?php alexcuar_pro_icon( 'mail' ); ?><?php echo esc_html( alexcuar_pro_option( 'contact_text' ) ); ?></a>
				<?php endif; ?>
				<?php if ( $linkedin ) : ?>
					<a class="btn btn--lg btn--ghost" data-magnetic href="<?php echo esc_url( $linkedin ); ?>" target="_blank" rel="noopener"><?php alexcuar_pro_icon( 'linkedin' ); ?>LinkedIn</a>
				<?php endif; ?>
				<?php if ( $cv_url ) : ?>
					<a class="btn btn--lg btn--ghost" data-magnetic href="<?php echo esc_url( $cv_url ); ?>" target="_blank" rel="noopener"><?php alexcuar_pro_icon( 'download' ); ?><?php echo esc_html( alexcuar_pro_option( 'cv_text' ) ); ?></a>
				<?php endif; ?>
			</div>
			<?php alexcuar_pro_social_links(); ?>
		</div>
	</div>
</section>
