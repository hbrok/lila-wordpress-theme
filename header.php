<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="description" content="<?php bloginfo( 'description' ); ?>">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href='http://fonts.googleapis.com/css?family=Pacifico|Bitter:400,700,400italic|Open+Sans:400italic,700italic,400,700,300' rel='stylesheet' type='text/css'>

  <link rel="icon" type="image/png" href="<?php echo get_template_directory_uri(); ?>/images/favicon.png" />

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="page">
  <header class="main-header">
    <nav class="wrapper">
        <h1 class="main-logo"><a href='<?php echo home_url(); ?>'><?php bloginfo("name"); ?></a></h1>

        <?php wp_nav_menu( array(
          'theme_location' => 'primary',
          'menu_id' => 'primary',
          'menu_class'=> 'main-nav',
          'depth' => -1, ) );
        ?>

    </nav>
  </header>