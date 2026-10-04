<?php
/**
 * Shared post grid + pagination for listing templates.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;
?>
<main id="primary" class="site-main">
	<div class="container">
		<?php if ( have_posts() ) : ?>
			<div class="post-grid">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/card' );
				endwhile;
				?>
			</div>
			<?php
			the_posts_pagination(
				array(
					'mid_size'  => 1,
					'prev_text' => '&larr;<span class="screen-reader-text">' . esc_html__( 'Anterior', 'alexcuar-pro' ) . '</span>',
					'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Siguiente', 'alexcuar-pro' ) . '</span>&rarr;',
				)
			);
			?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/none' ); ?>
		<?php endif; ?>
	</div>
</main>
