<?php
/**
 * Comments.
 *
 * @package AlexCuar_Pro
 */

defined( 'ABSPATH' ) || exit;

if ( post_password_required() ) {
	return;
}
?>
<section id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			$count = (int) get_comments_number();
			/* translators: %d: comment count. */
			printf( esc_html( _n( '%d comentario', '%d comentarios', $count, 'alexcuar-pro' ) ), (int) $count );
			?>
		</h2>
		<ol class="comment-list">
			<?php
			wp_list_comments(
				array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 40,
				)
			);
			?>
		</ol>
		<?php the_comments_navigation(); ?>
		<?php if ( ! comments_open() ) : ?>
			<p class="no-comments"><?php esc_html_e( 'Los comentarios están cerrados.', 'alexcuar-pro' ); ?></p>
		<?php endif; ?>
	<?php endif; ?>

	<?php
	comment_form(
		array(
			'title_reply'  => esc_html__( 'Deja un comentario', 'alexcuar-pro' ),
			'class_submit' => 'button',
		)
	);
	?>
</section>
