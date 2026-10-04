<?php
/**
 * Testimonials from colleagues.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$testimonials = alexcuar_pro_parse_rows( 'testimonials', 3 );
if ( ! $testimonials ) {
	return;
}
?>
<section class="section section--alt" id="testimonios">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Testimonios', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Lo que dicen', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'quienes trabajan conmigo', 'alexcuar-pro' ); ?></span></h2>
		</div>

		<div class="testimonials">
			<?php foreach ( $testimonials as $index => list( $quote, $author, $role ) ) : ?>
				<figure class="glass-card testimonial" data-spotlight data-reveal style="--reveal-delay:<?php echo (int) ( $index % 3 ) * 100; ?>">
					<blockquote class="testimonial__quote"><p><?php echo esc_html( $quote ); ?></p></blockquote>
					<figcaption class="testimonial__author">
						<span class="testimonial__avatar" aria-hidden="true"><?php echo esc_html( alexcuar_pro_initials( $author ) ); ?></span>
						<span>
							<strong><?php echo esc_html( $author ); ?></strong>
							<?php if ( $role ) : ?>
								<small><?php echo esc_html( $role ); ?></small>
							<?php endif; ?>
						</span>
					</figcaption>
				</figure>
			<?php endforeach; ?>
		</div>
	</div>
</section>
