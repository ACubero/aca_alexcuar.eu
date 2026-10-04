<?php
/**
 * Single post.
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
			<header class="entry-header page-hero">
				<?php alexcuar_pro_aurora(); ?>
				<div class="container container--narrow">
					<div data-reveal><?php alexcuar_pro_category_badge(); ?></div>
					<?php the_title( '<h1 class="entry-title" data-reveal style="--reveal-delay:80">', '</h1>' ); ?>
					<div data-reveal style="--reveal-delay:160"><?php alexcuar_pro_entry_meta( true ); ?></div>
				</div>
			</header>

			<?php if ( has_post_thumbnail() ) : ?>
				<figure class="entry-hero-image" data-reveal="zoom"><?php the_post_thumbnail( 'alexcuar-hero', array( 'loading' => 'eager', 'fetchpriority' => 'high' ) ); ?></figure>
			<?php endif; ?>

			<div class="container container--narrow">
				<div class="entry-content">
					<?php
					the_content();
					wp_link_pages(
						array(
							'before' => '<nav class="page-links">' . esc_html__( 'Páginas:', 'alexcuar-pro' ),
							'after'  => '</nav>',
						)
					);
					?>
				</div>

				<?php the_tags( '<ul class="entry-tags"><li>', '</li><li>', '</li></ul>' ); ?>

				<?php if ( alexcuar_pro_option( 'show_author_box' ) && get_the_author() ) : ?>
					<aside class="glass-card author-box" data-spotlight data-reveal>
						<?php echo get_avatar( get_the_author_meta( 'ID' ), 88 ); ?>
						<div>
							<p class="author-box__label"><?php esc_html_e( 'Escrito por', 'alexcuar-pro' ); ?></p>
							<h2 class="author-box__name"><a href="<?php echo esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ); ?>"><?php the_author(); ?></a></h2>
							<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<p class="author-box__bio"><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
							<?php endif; ?>
						</div>
					</aside>
				<?php endif; ?>

				<?php
				the_post_navigation(
					array(
						'prev_text' => '<span class="nav-label">&larr; ' . esc_html__( 'Anterior', 'alexcuar-pro' ) . '</span>%title',
						'next_text' => '<span class="nav-label">' . esc_html__( 'Siguiente', 'alexcuar-pro' ) . ' &rarr;</span>%title',
					)
				);

				if ( comments_open() || get_comments_number() ) {
					comments_template();
				}
				?>
			</div>
		</article>
	</main>

	<?php
	$related = alexcuar_pro_option( 'show_related' ) ? alexcuar_pro_related_query() : null;
	if ( $related ) :
		?>
		<section class="section section--alt">
			<div class="container">
				<div class="section-head">
					<p class="eyebrow" data-reveal><?php esc_html_e( 'Sigue leyendo', 'alexcuar-pro' ); ?></p>
					<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Artículos relacionados', 'alexcuar-pro' ); ?></h2>
				</div>
				<div class="post-grid">
					<?php
					while ( $related->have_posts() ) :
						$related->the_post();
						get_template_part( 'template-parts/card' );
					endwhile;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</section>
		<?php
	endif;
endwhile;

get_footer();
