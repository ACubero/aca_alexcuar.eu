<?php
/**
 * Static page.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<main id="primary" class="site-main">
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php get_template_part( 'template-parts/page-hero', null, array( 'title' => esc_html( get_the_title() ) ) ); ?>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="entry-hero-image" data-reveal="zoom"><?php the_post_thumbnail( 'alexcuar-hero', array( 'loading' => 'eager' ) ); ?></figure>
			<?php endif; ?>

			<div class="container container--narrow">
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages();
					?>
				</div>
				<?php
				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</article>
	</main>
	<?php
endwhile;

get_footer();
