<?php
// Create portfolio custom post type
function portfolio_post_type() {
  register_post_type( 'project',
    array( 'labels' => array(
      'name' => __( 'Projects', 'lila'  ),
      'singular_name' => __( 'Project', 'lila'  ),
      'all_items' => __( 'All Projects', 'lila'  ),
      'add_new' => __( 'Add New', 'lila'  ),
      'add_new_item' => __( 'Add New Project', 'lila'  ),
      'edit' => __( 'Edit', 'lila'  ),
      'edit_item' => __(' Edit Project', 'lila'  ),
      'new_item' => __( 'New Project', 'lila'  ),
      'view_item' => __( 'View Project', 'lila'  ),
      'search_items' => __( 'Search Projects', 'lila'  ),
      'not_found' => __( 'No Projects Found.', 'lila'  ),
      'not_found_in_trash' => __( 'Nothing found in Trash.', 'lila'  ),
      'parent_item_colon' => ''
      ),
      'description' => __( 'Projects.', 'lila'  ),
            'public' => true,
            'show_ui' => true,
            'menu_position' => 5,
            'has_archive' => 'project',
            'hierarchical' => true,
            'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'sticky') /* what's enabled in the post editor */
    )
  );
}
add_action( 'init', 'portfolio_post_type' );

// add portfolio tags
register_taxonomy( 'Skills',
  array( 'project' ),
  array( 'hierarchical' => false, // acts like tags
    'labels' => array(
      'name' => 'Skills',
      'singular_label' => 'Skill',
      'search_items' => 'Search Skills',
      'all_items' => 'All Skills',
      'edit_item' => 'Edit Skill',
      'update_item' => 'Update Skill',
      'add_new_item' => 'Add New Skill',
      'new_item_name' => 'New Skill',
      ),
  'rewrite' => true,
  )
);