<?php
/**
 * Parsers for the pipe-separated CV lists stored in the Customizer.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

/**
 * @return array<int, array<int, string>> One row per non-empty line, padded to $columns cells.
 */
function alexcuar_pro_parse_rows( string $option_key, int $columns ): array {
	$rows  = array();
	$lines = preg_split( '/\r\n|\r|\n/', (string) alexcuar_pro_option( $option_key ) );

	foreach ( $lines as $line ) {
		$line = trim( $line );
		if ( '' === $line ) {
			continue;
		}
		$cells  = array_map( 'trim', explode( '|', $line, $columns ) );
		$rows[] = array_pad( $cells, $columns, '' );
	}

	return $rows;
}

function alexcuar_pro_parse_lines( string $option_key ): array {
	$lines = preg_split( '/\r\n|\r|\n/', (string) alexcuar_pro_option( $option_key ) );
	return array_values( array_filter( array_map( 'trim', $lines ), 'strlen' ) );
}

function alexcuar_pro_split_list( string $value ): array {
	return array_values( array_filter( array_map( 'trim', explode( ',', $value ) ), 'strlen' ) );
}

/**
 * Splits "30+" into number 30 and suffix "+" so the counter can animate; non-numeric values stay static.
 *
 * @return array{number: ?int, prefix: string, suffix: string, raw: string}
 */
function alexcuar_pro_parse_stat( string $value ): array {
	if ( preg_match( '/^(\D*)(\d+)(.*)$/u', $value, $matches ) ) {
		return array(
			'number' => (int) $matches[2],
			'prefix' => $matches[1],
			'suffix' => $matches[3],
			'raw'    => $value,
		);
	}
	return array( 'number' => null, 'prefix' => '', 'suffix' => '', 'raw' => $value );
}

function alexcuar_pro_skill_names(): array {
	$names = array();
	foreach ( alexcuar_pro_parse_rows( 'skills', 3 ) as $row ) {
		$names = array_merge( $names, alexcuar_pro_split_list( $row[1] ) );
	}
	return array_values( array_unique( $names ) );
}

function alexcuar_pro_initials( string $name ): string {
	$initials = '';
	foreach ( array_slice( preg_split( '/\s+/', trim( $name ) ), 0, 2 ) as $word ) {
		$initials .= mb_strtoupper( mb_substr( $word, 0, 1 ) );
	}
	return '' !== $initials ? $initials : 'A';
}
