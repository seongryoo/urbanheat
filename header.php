<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<body <?php body_class( 'body' ); ?>>

<nav aria-labelledby="label_skiplink" class="contained">
  <span id="label_skiplink" class="aria-labelledby" aria-hidden="true">
    <?php _e( 'Skip link', 'urbanheat' ); ?>
  </span>
  <a href="#main" class="skip-link">
    <?php _e( 'Skip to main content', 'urbanheat' ); ?>
  </a>
</nav>

<header class="header">
  <div class="header-content contained wall-hugger content-bar">
    <a class="site-title wall-hugger__left" href="/">
      UrbanHeatATL
    </a>

    <div class="wall-hugger__right">
      <button
        aria-labelledby="label_burger"
        class="hamburger"
        aria-controls="nav-menu"
        aria-expanded="false"
        data-uha-interface="burger"
      >
        <span id="label_burger" class="aria-labelledby" aria-hidden="true">
          <?php _e( 'Open main menu', 'urbanheat' ); ?>
        </span>
        <svg viewBox="0 0 40 40"
          width="24"
          xmlns="http://www.w3.org/2000/svg"
          role="icon"
        >
          <g>
            <path class="bar-1" d="M4 4h32v8H4z" role="presentation"></path>
            <path class="bar-2" d="M4 16h32v8H4z" role="presentation"></path>
            <path class="bar-3" d="M4 28h32v8H4z" role="presentation"></path>
          </g>
        </svg>
        <span class="burger-text">Menu</span>
      </button>

      <nav id="nav-menu" aria-labelledby="label_mainnav" data-uha-interface="menu">
        <span id="label_mainnav" class="aria-labelledby" aria-hidden="true">
          <?php _e( 'Main menu', 'urbanheat' ); ?>
        </span>
        <?php
          wp_nav_menu( array(
            'menu' => 'primary',
            'depth' => 1,
            'container' => false,
            'menu_class' => 'menu menu--primary link-chain link-chain--flush-right',
          ) );
        ?>
      </nav>
    </div>
  </div>
</header>