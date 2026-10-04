<?php
/**
 * Listing / page header. Expects $args: eyebrow, title, description (HTML allowed), pills (bool).
 * Shows the header illustration configured on the current category or page, if any.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$args = wp_parse_args(
	$args ?? array(),
	array(
		'eyebrow'     => '',
		'title'       => '',
		'description' => '',
		'pills'       => false,
	)
);

$illustration = alexcuar_pro_current_illustration();
?>
<header class="page-hero <?php echo $illustration ? 'page-hero--split' : 'page-hero--center'; ?>">
	<?php alexcuar_pro_aurora(); ?>
	<div class="container page-hero__inner">
		<div class="page-hero__text">
			<?php if ( $args['eyebrow'] ) : ?>
				<p class="eyebrow" data-reveal><?php echo esc_html( $args['eyebrow'] ); ?></p>
			<?php endif; ?>
			<h1 class="page-hero__title" data-reveal style="--reveal-delay:80"><?php echo wp_kses_post( $args['title'] ); ?></h1>
			<?php if ( $args['description'] ) : ?>
				<div class="page-hero__desc" data-reveal style="--reveal-delay:160"><?php echo wp_kses_post( $args['description'] ); ?></div>
			<?php endif; ?>
			<?php if ( $args['pills'] ) : ?>
				<div data-reveal style="--reveal-delay:240"><?php alexcuar_pro_category_pills(); ?></div>
			<?php endif; ?>
		</div>
		<?php if ( $illustration ) : ?>
			<figure class="page-hero__art" data-reveal="zoom" style="--reveal-delay:160">
				<img src="<?php echo esc_url( $illustration ); ?>" alt="" width="800" height="500" loading="eager" decoding="async">
			</figure>
		<?php endif; ?>
	</div>
</header>
