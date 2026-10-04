<?php
/**
 * Optional header illustration for categories and pages (bundled SVGs or a custom image URL).
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

const ALEXCUAR_PRO_ILLUSTRATION_KEY     = '_alexcuar_hero_illustration';
const ALEXCUAR_PRO_ILLUSTRATION_URL_KEY = '_alexcuar_hero_illustration_url';
const ALEXCUAR_PRO_ILLUSTRATION_NONCE   = 'alexcuar_pro_illustration_nonce';

function alexcuar_pro_illustration_choices(): array {
	return array(
		''                  => __( 'Ninguna', 'alexcuar-pro' ),
		'cosas-que-se'      => __( 'Cosas qué sé (libro y conocimientos)', 'alexcuar-pro' ),
		'cosas-que-aprendo' => __( 'Cosas que aprendo (escalera de progreso)', 'alexcuar-pro' ),
		'mis-cosas'         => __( 'Mis cosas (escritorio)', 'alexcuar-pro' ),
	);
}

function alexcuar_pro_illustration_url( string $choice, string $custom_url ): string {
	if ( '' !== $custom_url ) {
		return $custom_url;
	}
	if ( '' !== $choice && array_key_exists( $choice, alexcuar_pro_illustration_choices() ) ) {
		return get_template_directory_uri() . '/assets/illustrations/' . $choice . '.svg';
	}
	return '';
}

function alexcuar_pro_current_illustration(): string {
	if ( is_category() ) {
		$term_id = (int) get_queried_object_id();
		return alexcuar_pro_illustration_url(
			(string) get_term_meta( $term_id, ALEXCUAR_PRO_ILLUSTRATION_KEY, true ),
			(string) get_term_meta( $term_id, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, true )
		);
	}
	if ( is_page() ) {
		$post_id = (int) get_queried_object_id();
		return alexcuar_pro_illustration_url(
			(string) get_post_meta( $post_id, ALEXCUAR_PRO_ILLUSTRATION_KEY, true ),
			(string) get_post_meta( $post_id, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, true )
		);
	}
	return '';
}

function alexcuar_pro_sanitize_illustration_input(): array {
	// phpcs:disable WordPress.Security.NonceVerification.Missing -- nonce checked by callers.
	$choice = isset( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_KEY ] ) ? sanitize_key( wp_unslash( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_KEY ] ) ) : '';
	$url    = isset( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_URL_KEY ] ) ? esc_url_raw( trim( wp_unslash( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_URL_KEY ] ) ) ) : '';
	// phpcs:enable
	if ( ! array_key_exists( $choice, alexcuar_pro_illustration_choices() ) ) {
		$choice = '';
	}
	return array( $choice, $url );
}

function alexcuar_pro_illustration_fields( string $choice, string $url ): void {
	wp_nonce_field( 'alexcuar_pro_save_illustration', ALEXCUAR_PRO_ILLUSTRATION_NONCE );
	?>
	<p>
		<label for="alexcuar-illustration"><strong><?php esc_html_e( 'Ilustración de cabecera', 'alexcuar-pro' ); ?></strong></label><br>
		<select id="alexcuar-illustration" name="<?php echo esc_attr( ALEXCUAR_PRO_ILLUSTRATION_KEY ); ?>" style="width:100%;max-width:420px">
			<?php foreach ( alexcuar_pro_illustration_choices() as $value => $label ) : ?>
				<option value="<?php echo esc_attr( $value ); ?>" <?php selected( $choice, $value ); ?>><?php echo esc_html( $label ); ?></option>
			<?php endforeach; ?>
		</select>
	</p>
	<p>
		<label for="alexcuar-illustration-url"><?php esc_html_e( 'O URL de una imagen propia (tiene prioridad):', 'alexcuar-pro' ); ?></label><br>
		<input type="url" id="alexcuar-illustration-url" name="<?php echo esc_attr( ALEXCUAR_PRO_ILLUSTRATION_URL_KEY ); ?>" value="<?php echo esc_attr( $url ); ?>" placeholder="https://" style="width:100%;max-width:420px">
	</p>
	<?php
}

/* ---------- Categories ---------- */

function alexcuar_pro_category_add_fields(): void {
	echo '<div class="form-field">';
	alexcuar_pro_illustration_fields( '', '' );
	echo '</div>';
}
add_action( 'category_add_form_fields', 'alexcuar_pro_category_add_fields' );

function alexcuar_pro_category_edit_fields( WP_Term $term ): void {
	echo '<tr class="form-field"><th scope="row">' . esc_html__( 'Cabecera', 'alexcuar-pro' ) . '</th><td>';
	alexcuar_pro_illustration_fields(
		(string) get_term_meta( $term->term_id, ALEXCUAR_PRO_ILLUSTRATION_KEY, true ),
		(string) get_term_meta( $term->term_id, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, true )
	);
	echo '</td></tr>';
}
add_action( 'category_edit_form_fields', 'alexcuar_pro_category_edit_fields' );

function alexcuar_pro_save_category_illustration( int $term_id ): void {
	$nonce = isset( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_NONCE ] ) ? sanitize_text_field( wp_unslash( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_NONCE ] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'alexcuar_pro_save_illustration' ) || ! current_user_can( 'manage_categories' ) ) {
		return;
	}
	list( $choice, $url ) = alexcuar_pro_sanitize_illustration_input();
	update_term_meta( $term_id, ALEXCUAR_PRO_ILLUSTRATION_KEY, $choice );
	update_term_meta( $term_id, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, $url );
}
add_action( 'created_category', 'alexcuar_pro_save_category_illustration' );
add_action( 'edited_category', 'alexcuar_pro_save_category_illustration' );

/* ---------- Pages ---------- */

function alexcuar_pro_add_illustration_meta_box(): void {
	add_meta_box( 'alexcuar-illustration-box', __( 'Ilustración de cabecera', 'alexcuar-pro' ), 'alexcuar_pro_render_illustration_meta_box', 'page', 'side' );
}
add_action( 'add_meta_boxes', 'alexcuar_pro_add_illustration_meta_box' );

function alexcuar_pro_render_illustration_meta_box( WP_Post $post ): void {
	alexcuar_pro_illustration_fields(
		(string) get_post_meta( $post->ID, ALEXCUAR_PRO_ILLUSTRATION_KEY, true ),
		(string) get_post_meta( $post->ID, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, true )
	);
}

function alexcuar_pro_save_page_illustration( int $post_id ): void {
	$nonce = isset( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_NONCE ] ) ? sanitize_text_field( wp_unslash( $_POST[ ALEXCUAR_PRO_ILLUSTRATION_NONCE ] ) ) : '';
	if ( ! wp_verify_nonce( $nonce, 'alexcuar_pro_save_illustration' ) || ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) || ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}
	list( $choice, $url ) = alexcuar_pro_sanitize_illustration_input();
	update_post_meta( $post_id, ALEXCUAR_PRO_ILLUSTRATION_KEY, $choice );
	update_post_meta( $post_id, ALEXCUAR_PRO_ILLUSTRATION_URL_KEY, $url );
}
add_action( 'save_post_page', 'alexcuar_pro_save_page_illustration' );
