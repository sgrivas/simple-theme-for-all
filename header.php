<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset') ;?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>

    <!-- Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;400;700&display=swap" rel="stylesheet">   
</head>
<body <?php body_class(); ?>>
<header>
<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid container">
    <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <div class="navbar-nav">
        <?php
          wp_nav_menu(array(
            'theme_location' => 'main-menu',
          ));
        ?>
      </div>
    </div>
  </div>
</nav>
</header>