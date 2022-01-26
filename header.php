<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body>

<nav aria-labelledby="label_skiplink" class="contained">
  <span id="label_skiplink" class="aria-labelledby" aria-hidden="true">
    <?php _e( 'Skip link', 'urbanheat' ); ?>
  </span>
  <a href="#main" class="skip-link">
    <?php _e( 'Skip to main content', 'urbanheat' ); ?>
  </a>
</nav>

<nav aria-labelledby="label_mainnav">
  <span id="label_mainnav" class="aria-labelledby" aria-hidden="true">
    <?php _e( 'Main menu', 'urbanheat' ); ?>
  </span>
  <?php 
  // Using a custom nav walker in order to generate a more accessible nested menu
    wp_nav_menu( array(
      'menu' => 'primary',
      'walker' => new UrbanHeatATL_Nav_Walker()
    ) );
  ?>
</nav>
