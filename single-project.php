<?php get_header(); ?>
<main class="wrapper">

  <?php if ( have_posts() ) : ?>
      <?php while ( have_posts() ) : the_post(); ?>

          <article class="post">
              <header class="post-header">
                <h1 class="title"><a href="<?php the_permalink() ?>" title="<?php echo esc_attr( get_the_title() ); ?>" rel="bookmark" ><?php the_title(); ?></a></h1>
              </header>

              <div class="post-content">
                <?php the_content(); ?>

                <div class="icon-bookmark skills-list">
                <?php echo get_the_term_list( $post->ID, 'Skills', '', ', ' ); ?>
                </div>
              </div>
        </article>

      <?php endwhile; ?>
  <?php endif; ?>

</main>

<?php get_footer(); ?>