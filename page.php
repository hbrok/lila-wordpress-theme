<?php get_header(); ?>

  <main class="wrapper">

        <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>

        <article class="post">
            <header class="post-header">
                <h1 class="title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
            </header>

            <div class="post-content">
                <?php the_content(); ?>
            </div>

            <?php comments_template('', true); ?>
        </article>

    <?php endwhile;

      the_posts_pagination( array(
        'prev_text' => __( 'Previous page', 'lila' ),
        'next_text'  => __( 'Next page', 'lila' ),
        'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'lila' ) . ' </span>',
      ) );

      else :
        _e('No posts found.');

      endif;

    ?>
      </article> <!-- .wrapper -->
  </main>

<?php get_footer(); ?>