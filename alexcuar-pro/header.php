<?php
/**
 * Header.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Saltar al contenido', 'alexcuar-pro' ); ?></a>

<?php if ( is_singular( 'post' ) ) : ?>
	<div class="reading-progress" aria-hidden="true"></div>
<?php endif; ?>

<header id="masthead" class="site-header">
	<div class="container site-header__inner">
		<?php get_template_part( 'template-parts/brand' ); ?>

		<div class="header-actions">
			<nav id="site-navigation" class="main-navigation" aria-label="<?php esc_attr_e( 'Principal', 'alexcuar-pro' ); ?>">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary',
						'menu_id'        => 'primary-menu',
						'container'      => false,
						'fallback_cb'    => 'alexcuar_pro_fallback_menu',
					)
				);
				?>
			</nav>
			<button class="icon-button search-toggle" type="button" aria-controls="header-search" aria-expanded="false" aria-label="<?php esc_attr_e( 'Buscar', 'alexcuar-pro' ); ?>"><?php alexcuar_pro_icon( 'search' ); ?></button>
			<button class="icon-button theme-toggle" type="button" aria-label="<?php esc_attr_e( 'Cambiar modo claro/oscuro', 'alexcuar-pro' ); ?>"><?php alexcuar_pro_icon( 'moon' ); ?><?php alexcuar_pro_icon( 'sun' ); ?></button>
			<?php $contact_url = alexcuar_pro_contact_url(); ?>
			<?php if ( $contact_url ) : ?>
				<a class="btn btn--sm header-cta" href="<?php echo esc_url( is_front_page() ? '#contacto' : home_url( '/#contacto' ) ); ?>"><?php echo esc_html( alexcuar_pro_option( 'contact_text' ) ); ?></a>
			<?php endif; ?>
			<button class="icon-button menu-toggle" type="button" aria-controls="site-navigation" aria-expanded="false" aria-label="<?php esc_attr_e( 'Menú', 'alexcuar-pro' ); ?>"><span class="menu-toggle__bars"></span></button>
		</div>
	</div>
</header>
<div id="header-search" class="header-search" hidden>
	<div class="container container--narrow"><?php get_search_form(); ?></div>
</div>
