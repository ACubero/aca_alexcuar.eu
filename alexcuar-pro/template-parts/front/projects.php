<?php
/**
 * Featured projects.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$projects = alexcuar_pro_parse_rows( 'projects', 5 );
if ( ! $projects ) {
	return;
}
?>
<section class="section section--alt" id="proyectos">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow" data-reveal><?php esc_html_e( 'Proyectos', 'alexcuar-pro' ); ?></p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'Cosas que he', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'construido', 'alexcuar-pro' ); ?></span></h2>
		</div>

		<div class="projects">
			<?php foreach ( $projects as $index => list( $title, $description, $url, $tags, $repo ) ) : ?>
				<article class="glass-card project" data-spotlight data-tilt data-reveal style="--reveal-delay:<?php echo (int) ( $index % 3 ) * 100; ?>">
					<span class="project__index"><?php echo esc_html( sprintf( '%02d', $index + 1 ) ); ?></span>
					<h3 class="project__title">
						<?php if ( $url ) : ?>
							<a href="<?php echo esc_url( $url ); ?>"<?php echo 0 !== strpos( $url, home_url() ) ? ' target="_blank" rel="noopener"' : ''; ?>><?php echo esc_html( $title ); ?></a>
						<?php else : ?>
							<?php echo esc_html( $title ); ?>
						<?php endif; ?>
					</h3>
					<p class="project__text"><?php echo esc_html( $description ); ?></p>
					<div class="project__foot">
						<ul class="chips">
							<?php foreach ( alexcuar_pro_split_list( $tags ) as $tag ) : ?>
								<li><?php echo esc_html( $tag ); ?></li>
							<?php endforeach; ?>
						</ul>
						<?php if ( $repo && $repo !== $url ) : ?>
							<a class="project__repo" href="<?php echo esc_url( $repo ); ?>" target="_blank" rel="noopener" aria-label="<?php echo esc_attr( sprintf( __( 'Código de %s en GitHub', 'alexcuar-pro' ), $title ) ); ?>"><?php alexcuar_pro_icon( 'github' ); ?></a>
						<?php endif; ?>
						<?php if ( $url ) : ?>
							<span class="project__arrow" aria-hidden="true"><?php alexcuar_pro_icon( 'arrow' ); ?></span>
						<?php endif; ?>
					</div>
				</article>
			<?php endforeach; ?>
		</div>
	</div>
</section>
