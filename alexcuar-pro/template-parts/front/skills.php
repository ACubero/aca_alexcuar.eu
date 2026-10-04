<?php
/**
 * Skills bento + marquee.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$groups = alexcuar_pro_parse_rows( 'skills', 3 );
if ( ! $groups ) {
	return;
}
$names = alexcuar_pro_skill_names();
?>
<section class="section" id="habilidades">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Habilidades', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Del ERP clásico a la', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'inteligencia artificial', 'alexcuar-pro' ); ?></span></h2>
			<p class="section-lead" data-reveal style="--reveal-delay:160"><?php esc_html_e( 'Una base sólida en software empresarial combinada con curiosidad constante por las nuevas tecnologías.', 'alexcuar-pro' ); ?></p>
		</div>

		<div class="bento">
			<?php foreach ( $groups as $index => list( $title, $items, $icon ) ) : ?>
				<article class="glass-card" data-spotlight data-reveal style="--reveal-delay:<?php echo (int) ( $index % 3 ) * 100; ?>">
					<span class="glass-card__icon"><?php alexcuar_pro_icon( $icon ? $icon : 'code' ); ?></span>
					<h3 class="glass-card__title"><?php echo esc_html( $title ); ?></h3>
					<ul class="chips">
						<?php foreach ( alexcuar_pro_split_list( $items ) as $item ) : ?>
							<li><?php echo esc_html( $item ); ?></li>
						<?php endforeach; ?>
					</ul>
				</article>
			<?php endforeach; ?>
		</div>
	</div>

	<?php if ( $names ) : ?>
		<div class="marquee" aria-hidden="true">
			<div class="marquee__track">
				<?php for ( $copy = 0; $copy < 2; $copy++ ) : ?>
					<?php foreach ( $names as $name ) : ?>
						<span class="marquee__item"><?php echo esc_html( $name ); ?></span>
					<?php endforeach; ?>
				<?php endfor; ?>
			</div>
		</div>
	<?php endif; ?>
</section>
