<?php
/**
 * Post card.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'card' ); ?> data-tilt data-reveal>
	<div class="card__media">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'alexcuar-card', array( 'alt' => '' ) ); ?>
		<?php else : ?>
			<div class="card__placeholder" aria-hidden="true"><span class="text-gradient"><?php echo esc_html( mb_strtoupper( mb_substr( get_the_title(), 0, 1 ) ) ); ?></span></div>
		<?php endif; ?>
	</div>
	<div class="card__body">
		<div>
			<?php alexcuar_pro_category_badge(); ?>
			<?php if ( is_sticky() && is_home() ) : ?>
				<span class="badge badge--sticky"><?php esc_html_e( 'Destacado', 'alexcuar-pro' ); ?></span>
			<?php endif; ?>
		</div>
		<h3 class="card__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<div class="card__excerpt"><?php the_excerpt(); ?></div>
		<footer class="card__footer"><?php alexcuar_pro_entry_meta(); ?></footer>
	</div>
</article>
