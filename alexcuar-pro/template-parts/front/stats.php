<?php
/**
 * Animated key figures.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$stats = array_slice( alexcuar_pro_parse_rows( 'stats', 2 ), 0, 4 );
if ( ! $stats ) {
	return;
}
?>
<section class="stats" aria-label="<?php esc_attr_e( 'Cifras', 'alexcuar-pro' ); ?>">
	<div class="container">
		<div class="stats__grid" data-reveal>
			<?php foreach ( $stats as list( $value, $label ) ) : ?>
				<?php $stat = alexcuar_pro_parse_stat( $value ); ?>
				<div class="stat">
					<?php if ( null !== $stat['number'] ) : ?>
						<span class="stat__value text-gradient"><?php echo esc_html( $stat['prefix'] ); ?><span data-count="<?php echo (int) $stat['number']; ?>"><?php echo (int) $stat['number']; ?></span><?php echo esc_html( $stat['suffix'] ); ?></span>
					<?php else : ?>
						<span class="stat__value text-gradient"><?php echo esc_html( $stat['raw'] ); ?></span>
					<?php endif; ?>
					<span class="stat__label"><?php echo esc_html( $label ); ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
