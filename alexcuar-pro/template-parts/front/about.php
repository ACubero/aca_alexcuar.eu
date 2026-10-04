<?php
/**
 * About me.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$paragraphs = array_filter( array_map( 'trim', preg_split( '/(\r\n|\r|\n){2,}/', (string) alexcuar_pro_option( 'about_text' ) ) ) );
$cards      = alexcuar_pro_parse_rows( 'about_cards', 3 );
?>
<section class="section" id="sobre-mi">
	<div class="container about">
		<div>
			<div class="section-head" style="margin-bottom:32px">
				<p class="eyebrow" data-reveal><?php esc_html_e( 'Sobre mí', 'alexcuar-pro' ); ?></p>
				<h2 class="section-title" data-reveal style="--reveal-delay:80"><?php echo esc_html( alexcuar_pro_option( 'about_title' ) ); ?></h2>
			</div>
			<div class="about__text" data-reveal style="--reveal-delay:160">
				<?php foreach ( $paragraphs as $paragraph ) : ?>
					<p><?php echo esc_html( $paragraph ); ?></p>
				<?php endforeach; ?>
			</div>
		</div>

		<?php if ( $cards ) : ?>
			<div class="about__cards">
				<?php foreach ( $cards as $index => list( $title, $text, $icon ) ) : ?>
					<article class="glass-card" data-spotlight data-reveal style="--reveal-delay:<?php echo (int) $index * 100; ?>">
						<span class="glass-card__icon"><?php alexcuar_pro_icon( $icon ? $icon : 'sparkles' ); ?></span>
						<h3 class="glass-card__title"><?php echo esc_html( $title ); ?></h3>
						<p class="glass-card__text"><?php echo esc_html( $text ); ?></p>
					</article>
				<?php endforeach; ?>
			</div>
		<?php endif; ?>
	</div>
</section>
