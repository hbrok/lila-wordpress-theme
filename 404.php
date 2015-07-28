<?php
/**
 * Template for displaying 404 pages (Not Found)
 */

get_header(); ?>

  <main class="wrapper">
    <div class="post">
    	<h1 class="fancy-heading"><?php _e( 'Page Not Found', 'lila' ); ?></h1>

    	<h3><?php _e( 'This is somewhat embarrassing, isn’t it?', 'lila' ); ?></h3>
    	<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'lila' ); ?></p>
    	<?php get_search_form(); ?>
    </div>
  </main>

<?php get_footer(); ?>