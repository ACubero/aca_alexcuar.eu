<?php
/**
 * Training and certifications grouped by issuer.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$issuers = alexcuar_pro_parse_rows( 'certifications', 3 );
if ( ! $issuers ) {
	return;
}
$linkedin = alexcuar_pro_option( 'social_linkedin' );
?>
<section class="section" id="formacion">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Formación', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Aprendiendo IA', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'en las mejores fuentes', 'alexcuar-pro' ); ?></span></h2>
			<?php if ( $linkedin ) : ?>
				<p class="section-lead" data-reveal style="--reveal-delay:160">
					<?php esc_html_e( 'Cursos y certificaciones recientes. Credenciales verificables en', 'alexcuar-pro' ); ?>
					<a href="<?php echo esc_url( untrailingslashit( $linkedin ) . '/details/certifications/' ); ?>" target="_blank" rel="noopener">LinkedIn</a>.
				</p>
			<?php endif; ?>
		</div>

		<div class="bento">
			<?php foreach ( $issuers as $index => list( $issuer, $courses, $icon ) ) : ?>
				<article class="glass-card" data-spotlight data-reveal style="--reveal-delay:<?php echo (int) ( $index % 3 ) * 100; ?>">
					<span class="glass-card__icon"><?php alexcuar_pro_icon( $icon ? $icon : 'sparkles' ); ?></span>
					<h3 class="glass-card__title"><?php echo esc_html( $issuer ); ?></h3>
					<ul class="chips">
						<?php foreach ( alexcuar_pro_split_list( $courses ) as $course ) : ?>
							<li><?php echo esc_html( $course ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
