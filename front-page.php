<?php get_header(); ?>

	<main class="front-page" role="main">
    <section class="front-page-intro wrapper">
      <div class="col-3">
        <div class="front-page-avatar avatar"></div>
      </div>

      <div class="col-9">
        <h1 class="front-page-speech-bubble"><?php echo get_theme_mod( 'lila_front_page_speech_bubble', 'Hello!' ); ?></h1>
        <p class="front-page-blurb">
          <?php echo get_theme_mod( 'lila_front_page_blurb', 'I\'m sure you have interesting stuff to say. You should probably put that stuff here.' ); ?>
        </p>
      </div>
    </section>

    <section class="front-page-tiles">
      <div class="wrapper">
        <h1 class="fancy-heading">My Work</h1>

          <?php
            $num_posts = 0;

            $args = array(
              'post_type' => 'project',
              'showposts' => 3,
              'order' => 'ASC'
              );
            $loop = new WP_Query( $args );

            while ( $loop->have_posts() ) : $loop->the_post();
              $num_posts++;
          ?>

          <div class="col-4">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
            <h3><a class="project-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
          </div>

          <?php endwhile; ?>

        </div>
        <?php
        //  Display "Show More" button if there are more than 3 posts
        if ( $num_posts > 3 ) : ?>
          <div class="row">
            <div class="col-12">
              <a href="#" class="button">See more..</a>
            </div>
          </div>
        <?php endif; ?>
        </div>
    </section>
  </main>

 <?php get_footer(); ?>