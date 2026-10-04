<?php
/**
 * Experience timeline.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$jobs = alexcuar_pro_parse_rows( 'experience', 4 );
if ( ! $jobs ) {
	return;
}
?>
<section class="section section--alt" id="experiencia">
	<div class="container">
		<div class="section-head section-head--center">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Trayectoria', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Tres décadas escribiendo', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'software que funciona', 'alexcuar-pro' ); ?></span></h2>
		</div>

		<ol class="timeline" data-timeline>
			<?php foreach ( $jobs as $index => list( $period, $role, $org, $description ) ) : ?>
				<li class="timeline__item" data-reveal="<?php echo 0 === $index % 2 ? 'left' : 'right'; ?>">
					<span class="timeline__dot" aria-hidden="true"></span>
					<div class="timeline__period"><?php echo esc_html( $period ); ?></div>
					<article class="glass-card timeline__card" data-spotlight>
						<h3 class="glass-card__title"><?php echo esc_html( $role ); ?></h3>
						<?php if ( $org ) : ?>
							<span class="timeline__org"><?php echo esc_html( $org ); ?></span>
						<?php endif; ?>
						<?php if ( $description ) : ?>
							<p class="glass-card__text"><?php echo esc_html( $description ); ?></p>
						<?php endif; ?>
					</article>
				</li>
			<?php endforeach; ?>
		</ol>
	</div>
</section>
