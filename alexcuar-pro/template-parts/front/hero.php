<?php
/**
 * CV hero.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

$roles       = alexcuar_pro_parse_lines( 'hero_roles' );
$chips       = array_slice( alexcuar_pro_parse_lines( 'hero_chips' ), 0, 3 );
$chip_icons  = array( 'code', 'briefcase', 'sparkles' );
$badge       = alexcuar_pro_option( 'hero_badge' );
$cv_url      = alexcuar_pro_option( 'cv_url' );
$contact_url = alexcuar_pro_contact_url();
$name_words  = preg_split( '/\s+/', trim( (string) alexcuar_pro_option( 'hero_name' ) ), -1, PREG_SPLIT_NO_EMPTY );
$chip_depths = array( 46, -38, 30 );
?>
<section class="hero" id="inicio" data-hero>
	<?php alexcuar_pro_aurora(); ?>
	<div class="hero__grid" aria-hidden="true"></div>
	<div class="hero__spotlight" aria-hidden="true"></div>
	<div class="hero__particles" aria-hidden="true">
		<?php for ( $particle = 0; $particle < 18; $particle++ ) : ?>
			<span style="--x:<?php echo (int) ( ( $particle * 37 + 11 ) % 100 ); ?>%;--s:<?php echo 2 + $particle % 3; ?>px;--d:<?php echo 9 + ( $particle * 7 ) % 9; ?>s;--delay:-<?php echo ( $particle * 13 ) % 17; ?>s;--drift:<?php echo ( $particle % 2 ? 1 : -1 ) * ( 20 + ( $particle * 9 ) % 50 ); ?>px"></span>
		<?php endfor; ?>
	</div>

	<div class="container hero__inner">
		<div class="hero__content">
			<?php if ( $badge ) : ?>
				<p class="pill" data-reveal><span class="pill__dot" aria-hidden="true"></span><?php echo esc_html( $badge ); ?></p>
			<?php endif; ?>

			<p class="hero__hello" data-reveal style="--reveal-delay:80"><?php echo esc_html( alexcuar_pro_option( 'hero_hello' ) ); ?></p>
			<h1 class="hero__title" data-reveal="mask">
				<?php foreach ( $name_words as $word_index => $word ) : ?>
					<span class="word"><span class="word__inner text-gradient" style="--w:<?php echo (int) $word_index; ?>"><?php echo esc_html( $word ); ?></span></span>
				<?php endforeach; ?>
			</h1>

			<?php if ( $roles ) : ?>
				<p class="hero__role" data-reveal style="--reveal-delay:240">
					<span class="typed" data-roles="<?php echo esc_attr( wp_json_encode( $roles ) ); ?>"><?php echo esc_html( $roles[0] ); ?></span><span class="typed-caret" aria-hidden="true"></span>
				</p>
			<?php endif; ?>

			<p class="hero__lead" data-reveal style="--reveal-delay:320"><?php echo esc_html( alexcuar_pro_option( 'hero_lead' ) ); ?></p>

			<div class="hero__actions" data-reveal style="--reveal-delay:400">
				<?php if ( $cv_url ) : ?>
					<a class="btn btn--lg" data-magnetic href="<?php echo esc_url( $cv_url ); ?>" target="_blank" rel="noopener"><?php alexcuar_pro_icon( 'download' ); ?><?php echo esc_html( alexcuar_pro_option( 'cv_text' ) ); ?></a>
				<?php else : ?>
					<a class="btn btn--lg" data-magnetic href="#experiencia"><?php esc_html_e( 'Ver trayectoria', 'alexcuar-pro' ); ?><?php alexcuar_pro_icon( 'arrow' ); ?></a>
				<?php endif; ?>
				<?php if ( $contact_url ) : ?>
					<a class="btn btn--lg btn--ghost" data-magnetic href="#contacto"><?php echo esc_html( alexcuar_pro_option( 'contact_text' ) ); ?></a>
				<?php endif; ?>
			</div>

			<div class="hero__social" data-reveal style="--reveal-delay:480"><?php alexcuar_pro_social_links(); ?></div>
		</div>

		<div class="hero__visual" data-reveal="zoom" style="--reveal-delay:200">
			<div class="hero__depth">
				<span class="avatar-orbit avatar-orbit--1" aria-hidden="true"></span>
				<span class="avatar-orbit avatar-orbit--2" aria-hidden="true"></span>
				<div class="avatar-ring" data-tilt><div class="avatar-ring__inner"><?php echo alexcuar_pro_avatar_html(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- core image markup / escaped fallback. ?></div></div>
				<?php foreach ( $chips as $index => $chip ) : ?>
					<span class="orbit-chip orbit-chip--<?php echo (int) $index + 1; ?>" style="--depth:<?php echo (int) $chip_depths[ $index ]; ?>px"><?php alexcuar_pro_icon( $chip_icons[ $index ] ); ?><?php echo esc_html( $chip ); ?></span>
				<?php endforeach; ?>
			</div>
		</div>
	</div>

	<a class="scroll-cue" href="#sobre-mi" aria-label="<?php esc_attr_e( 'Bajar', 'alexcuar-pro' ); ?>"></a>
</section>
