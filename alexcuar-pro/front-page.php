<?php
/**
 * Front page: CV / portfolio landing. Falls back to the regular templates when disabled in the Customizer.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

if ( ! alexcuar_pro_option( 'hero_show' ) ) {
	require get_template_directory() . ( 'page' === get_option( 'show_on_front' ) ? '/page.php' : '/index.php' );
	return;
}

get_header();
?>
<main id="primary" class="site-main site-main--cv" style="padding-bottom:0">
	<?php
	foreach ( array( 'hero', 'stats', 'about', 'experience', 'skills', 'projects', 'certifications', 'testimonials', 'posts', 'github', 'contact' ) as $section ) {
		get_template_part( 'template-parts/front/' . $section );
	}
	?>
</main>
<?php
get_footer();
