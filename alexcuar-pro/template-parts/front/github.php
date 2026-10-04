<?php
/**
 * Latest GitHub activity.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$repos = alexcuar_pro_github_repos();
if ( ! $repos ) {
	return;
}
?>
<section class="section section--alt" id="github">
	<div class="container">
		<div class="section-head">
			<p class="eyebrow" data-reveal>GitHub</p>
			<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php esc_html_e( 'En lo que estoy', 'alexcuar-pro' ); ?> <span class="text-gradient"><?php esc_html_e( 'trabajando', 'alexcuar-pro' ); ?></span></h2>
		</div>

		<div class="projects">
			<?php foreach ( $repos as $index => $repo ) : ?>
				<article class="glass-card project" data-spotlight data-reveal style="--reveal-delay:<?php echo (int) ( $index % 3 ) * 100; ?>">
					<p class="repo-meta">
						<?php if ( $repo['language'] ) : ?>
							<span><?php echo esc_html( $repo['language'] ); ?></span>
						<?php endif; ?>
						<time datetime="<?php echo esc_attr( $repo['pushed'] ); ?>"><?php echo esc_html( sprintf( __( 'Actualizado hace %s', 'alexcuar-pro' ), human_time_diff( strtotime( $repo['pushed'] ) ) ) ); ?></time>
					</p>
					<h3 class="project__title" style="margin-top:18px">
						<a href="<?php echo esc_url( $repo['url'] ); ?>" target="_blank" rel="noopener"><?php echo esc_html( $repo['name'] ); ?></a>
					</h3>
					<p class="project__text"><?php echo esc_html( $repo['description'] ); ?></p>
					<div class="project__foot">
						<span class="project__arrow" aria-hidden="true"><?php alexcuar_pro_icon( 'github' ); ?></span>
					</div>
				</article>
			<?php endforeach; ?>
		</div>

		<div class="section-foot" data-reveal>
			<a class="btn btn--ghost" href="<?php echo esc_url( alexcuar_pro_option( 'social_github' ) ); ?>" target="_blank" rel="noopener"><?php esc_html_e( 'Ver todo en GitHub', 'alexcuar-pro' ); ?><?php alexcuar_pro_icon( 'arrow' ); ?></a>
		</div>
	</div>
</section>
