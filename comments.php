<?php
/**
 * The template for displaying comments
 *
 */

if ( post_password_required() ) {
	return;
}
?>

<div class="comments">

	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<a href="#comments">
				<?php
					printf( _nx( 'One response to &ldquo;%2$s&rdquo;', '%1$s responses to &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'lila' ),
					number_format_i18n( get_comments_number() ), get_the_title() );
				?>
			</a>
		</h2>

		<ol class="comment-list">
			<?php
				wp_list_comments( array(
					'style'       => 'ol',
					'short_ping'  => true,
					'avatar_size' => 56,
				) );
			?>
		</ol>

	<?php endif; // have_comments() ?>

	<?php
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() && get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="no-comments"><?php _e( 'Comments are closed.', 'lila' ); ?></p>
	<?php endif; ?>

	<?php comment_form(); ?>

</div>