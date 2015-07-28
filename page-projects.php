<?php get_header(); ?>

  <main class="wrapper">
      <div class="row">
        <h1 class="fancy-heading">Projects</h1>

    	  <?php

					$args = array(
						'post_type' => 'project',
						'order' => 'ASC'
						);
					$loop = new WP_Query( $args );

					while ( $loop->have_posts() ) : $loop->the_post();
				?>

				<div class="col-4">
        	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
        	<h3 class="project-heading"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
      	</div>

        <?php	endwhile; ?>

      </div>
  </main>

 <?php get_footer(); ?>