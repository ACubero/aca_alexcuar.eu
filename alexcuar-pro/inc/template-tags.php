<?php
/**
 * Template helpers.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

function alexcuar_pro_reading_time( ?int $post_id = null ): int {
	$content = get_post_field( 'post_content', $post_id ?? get_the_ID() );
	$words   = str_word_count( wp_strip_all_tags( strip_shortcodes( (string) $content ) ) );
	return max( 1, (int) ceil( $words / 220 ) );
}

function alexcuar_pro_category_badge(): void {
	$categories = get_the_category();
	if ( ! $categories ) {
		return;
	}
	printf(
		'<a class="badge" href="%s">%s</a>',
		esc_url( get_category_link( $categories[0] ) ),
		esc_html( $categories[0]->name )
	);
}

function alexcuar_pro_entry_meta( bool $with_author = false ): void {
	$minutes = alexcuar_pro_reading_time();

	echo '<div class="entry-meta">';

	if ( $with_author && get_the_author() ) {
		printf(
			'<span class="byline">%s<a href="%s">%s</a></span>',
			get_avatar( get_the_author_meta( 'ID' ), 28 ),
			esc_url( get_author_posts_url( (int) get_the_author_meta( 'ID' ) ) ),
			esc_html( get_the_author() )
		);
	}

	printf(
		'<span class="posted-on">%s<time datetime="%s">%s</time></span>',
		alexcuar_pro_get_icon( 'calendar' ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		esc_attr( get_the_date( DATE_W3C ) ),
		esc_html( get_the_date() )
	);

	printf(
		'<span class="reading-time">%s%s</span>',
		alexcuar_pro_get_icon( 'clock' ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		/* translators: %d: minutes. */
		esc_html( sprintf( _n( '%d min de lectura', '%d min de lectura', $minutes, 'alexcuar-pro' ), $minutes ) )
	);

	echo '</div>';
}

function alexcuar_pro_avatar_html(): string {
	$attachment_id = (int) alexcuar_pro_option( 'hero_avatar' );
	if ( ! $attachment_id ) {
		$attachment_id = (int) get_theme_mod( 'custom_logo' );
	}
	if ( $attachment_id ) {
		return wp_get_attachment_image(
			$attachment_id,
			'medium_large',
			false,
			array(
				'alt'           => esc_attr( alexcuar_pro_option( 'hero_name' ) ),
				'loading'       => 'eager',
				'fetchpriority' => 'high',
			)
		);
	}
	return '<span class="avatar-ring__fallback text-gradient">' . esc_html( alexcuar_pro_brand_initials() ) . '</span>';
}

function alexcuar_pro_social_links(): void {
	$networks = array(
		'social_linkedin'  => array( 'linkedin', 'LinkedIn' ),
		'social_github'    => array( 'github', 'GitHub' ),
		'social_x'         => array( 'x', 'X' ),
		'social_instagram' => array( 'instagram', 'Instagram' ),
		'social_youtube'   => array( 'youtube', 'YouTube' ),
		'social_telegram'  => array( 'telegram', 'Telegram' ),
	);

	$items = '';
	foreach ( $networks as $key => list( $icon, $label ) ) {
		$url = alexcuar_pro_option( $key );
		if ( $url ) {
			$items .= sprintf(
				'<li><a href="%s" target="_blank" rel="noopener me" aria-label="%s">%s</a></li>',
				esc_url( $url ),
				esc_attr( $label ),
				alexcuar_pro_get_icon( $icon )
			);
		}
	}

	$email = alexcuar_pro_option( 'social_email' );
	if ( $email && is_email( $email ) ) {
		$items .= sprintf(
			'<li><a href="mailto:%s" aria-label="%s">%s</a></li>',
			esc_attr( antispambot( $email ) ),
			esc_attr__( 'Email', 'alexcuar-pro' ),
			alexcuar_pro_get_icon( 'mail' )
		);
	}

	if ( alexcuar_pro_option( 'show_rss' ) ) {
		$items .= sprintf( '<li><a href="%s" aria-label="RSS">%s</a></li>', esc_url( get_feed_link() ), alexcuar_pro_get_icon( 'rss' ) );
	}

	if ( $items ) {
		echo '<ul class="social-links">' . $items . '</ul>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- escaped above.
	}
}

function alexcuar_pro_contact_url(): string {
	$email = alexcuar_pro_option( 'social_email' );
	if ( $email && is_email( $email ) ) {
		return 'mailto:' . antispambot( $email );
	}
	return (string) alexcuar_pro_option( 'social_linkedin' );
}

function alexcuar_pro_blog_url(): string {
	$posts_page = (int) get_option( 'page_for_posts' );
	if ( $posts_page ) {
		return (string) get_permalink( $posts_page );
	}
	if ( 'posts' === get_option( 'show_on_front' ) && ! alexcuar_pro_option( 'hero_show' ) ) {
		return home_url( '/' );
	}
	$top = get_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'number' => 1 ) );
	return $top ? (string) get_category_link( $top[0] ) : home_url( '/' );
}

function alexcuar_pro_related_query(): ?WP_Query {
	$category_ids = wp_get_post_categories( get_the_ID() );
	if ( ! $category_ids ) {
		return null;
	}
	$query = new WP_Query(
		array(
			'category__in'        => $category_ids,
			'post__not_in'        => array( get_the_ID() ),
			'posts_per_page'      => 3,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);
	return $query->have_posts() ? $query : null;
}

function alexcuar_pro_category_pills(): void {
	echo '<ul class="category-pills">';
	wp_list_categories(
		array(
			'title_li'   => '',
			'orderby'    => 'count',
			'order'      => 'DESC',
			'number'     => 8,
			'hide_empty' => true,
			'depth'      => 1,
		)
	);
	echo '</ul>';
}

function alexcuar_pro_fallback_menu(): void {
	echo '<ul>';
	wp_list_pages( array( 'title_li' => '', 'depth' => 1 ) );
	echo '</ul>';
}

function alexcuar_pro_aurora(): void {
	echo '<div class="aurora" aria-hidden="true"><span class="aurora__blob aurora__blob--1"></span><span class="aurora__blob aurora__blob--2"></span><span class="aurora__blob aurora__blob--3"></span></div>';
}

function alexcuar_pro_brand_initials(): string {
	$initials = trim( (string) alexcuar_pro_option( 'brand_initials' ) );
	return '' !== $initials ? $initials : alexcuar_pro_initials( (string) alexcuar_pro_option( 'hero_name' ) );
}

function alexcuar_pro_brand_tagline(): string {
	$tagline = trim( (string) alexcuar_pro_option( 'brand_tagline' ) );
	return '' !== $tagline ? $tagline : (string) alexcuar_pro_option( 'hero_name' );
}

function alexcuar_pro_footer_giant(): string {
	$giant = trim( (string) alexcuar_pro_option( 'footer_giant' ) );
	if ( '' !== $giant ) {
		return $giant;
	}
	$name = trim( (string) alexcuar_pro_option( 'hero_name' ) );
	return '' !== $name ? (string) strtok( $name, ' ' ) : get_bloginfo( 'name' );
}

function alexcuar_pro_footer_copyright(): string {
	$copyright = trim( (string) alexcuar_pro_option( 'footer_copyright' ) );
	$year      = wp_date( 'Y' );
	if ( '' !== $copyright ) {
		return wp_kses_post( str_replace( '{year}', $year, $copyright ) );
	}
	$name = trim( (string) alexcuar_pro_option( 'hero_name' ) );
	return esc_html( sprintf( '© %s %s. %s', $year, '' !== $name ? $name : get_bloginfo( 'name' ), __( 'Todos los derechos reservados.', 'alexcuar-pro' ) ) );
}
