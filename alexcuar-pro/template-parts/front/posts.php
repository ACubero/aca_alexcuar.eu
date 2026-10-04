<?php
/**
 * Latest blog posts.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$latest = new WP_Query(
	array(
		'posts_per_page'      => 3,
		'ignore_sticky_posts' => true,
		'no_found_rows'       => true,
	)
);
if ( ! $latest->have_posts() ) {
	return;
}
?>
<section class="section" id="blog">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Blog', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php echo esc_html( alexcuar_pro_option( 'posts_title' ) ); ?></h2>
		</div>

		<div class="post-grid">
			<?php
			while ( $latest->have_posts() ) :
				$latest->the_post();
				get_template_part( 'template-parts/card' );
			endwhile;
			wp_reset_postdata();
			?>
		</div>

		<div class="section-foot" data-reveal>
			<a class="btn btn--ghost" href="<?php echo esc_url( alexcuar_pro_blog_url() ); ?>"><?php esc_html_e( 'Ver todos los artículos', 'alexcuar-pro' ); ?><?php alexcuar_pro_icon( 'arrow' ); ?></a>
		</div>
	</div>
</section>
