<?php
/**
 * Latest public GitHub repositories, read from the GitHub API and cached.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

function alexcuar_pro_github_user(): string {
	$path = (string) wp_parse_url( (string) alexcuar_pro_option( 'social_github' ), PHP_URL_PATH );
	$user = strtok( trim( $path, '/' ), '/' );
	return ( $user && preg_match( '/^[A-Za-z0-9-]{1,39}$/', $user ) ) ? $user : '';
}

/**
 * @return array<int, array{name: string, url: string, description: string, language: string, pushed: string}>
 */
function alexcuar_pro_github_repos( int $limit = 6 ): array {
	$user = alexcuar_pro_github_user();
	if ( '' === $user ) {
		return array();
	}

	$cache_key = 'alexcuar_pro_gh_' . strtolower( $user );
	$cached    = get_transient( $cache_key );
	if ( is_array( $cached ) ) {
		return array_slice( $cached, 0, $limit );
	}

	$response = wp_remote_get(
		'https://api.github.com/users/' . rawurlencode( $user ) . '/repos?sort=pushed&per_page=30',
		array(
			'timeout' => 5,
			'headers' => array( 'Accept' => 'application/vnd.github+json' ),
		)
	);
	$data = json_decode( (string) wp_remote_retrieve_body( $response ), true );

	if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) || ! is_array( $data ) ) {
		// WHY: short negative cache so a GitHub outage or rate limit doesn't slow every page load.
		set_transient( $cache_key, array(), 15 * MINUTE_IN_SECONDS );
		return array();
	}

	$repos = array();
	foreach ( $data as $repo ) {
		if ( ! empty( $repo['fork'] ) || ! empty( $repo['archived'] ) || empty( $repo['description'] ) || 0 === strcasecmp( (string) $repo['name'], $user ) ) {
			continue;
		}
		$repos[] = array(
			'name'        => (string) $repo['name'],
			'url'         => (string) $repo['html_url'],
			'description' => (string) $repo['description'],
			'language'    => (string) ( $repo['language'] ?? '' ),
			'pushed'      => (string) $repo['pushed_at'],
		);
	}

	set_transient( $cache_key, $repos, 6 * HOUR_IN_SECONDS );
	return array_slice( $repos, 0, $limit );
}
