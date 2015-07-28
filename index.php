<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme.
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 */
get_header(); ?>

  <main class="wrapper" role="main">

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

            <article class="post">
                <header class="post-header">
                    <h1 class="post-title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>

                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail(); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="post-content">
                    <div class="author-meta col-2">
                        <div class="author-icon icon">
                            <?php echo get_avatar( get_the_author_meta( 'user_email' ), 72 ); ?>
                        </div>

                        <div class="post-info">
                            <div class="icon-user"><?php the_author(); ?></div>
                            <div class="icon-clock"><time><?php the_time('F jS, Y') ?></time></div>

                            <?php if ( comments_open() ) :  ?>
                            <div class="icon-comment">
                            <?php comments_popup_link(
                                    '0 comments',
                                    '1 comment',
                                    '% comments',
                                    'comments-link',
                                    '0 comments'
                                ); ?>
                            </div>
                            <?php endif; ?>

                            <?php if ( has_category() ) : ?>
                                <div class="icon-bookmark"><?php the_category(', ') ?></div>
                            <?php endif; ?>

                            <?php if ( has_tag() ) : ?>
                                <div class="icon-bookmark"><?php the_tags('') ?></div>
                            <?php endif; ?>

                            <?php edit_post_link( __( 'Edit', 'lila' ), '<span class="edit-link">', '</span>' ); ?>
                        </div>
                    </div>

                    <div class="col-10">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php comments_template('', true); ?>


	   <?php endwhile;

       the_posts_navigation();

		the_posts_pagination( array(
			'prev_text' => __( 'Previous page', 'lila' ),
			'next_text'  => __( 'Next page', 'lila' ),
			'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lila' ) . ' </span>',
		) );

	else :
		_e('No posts found.');

	endif; ?>

  </article>
  </main>

<?php get_footer(); ?>