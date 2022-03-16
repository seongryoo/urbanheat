<?php

class UrbanHeatATL_Theme {
  const STYLES = array(
    'fonts',
    'base',
    'utils',
    'layout',
    'modules',
    'wordpress-overrides',
  );
  const SCRIPTS = array(
    'nav',
  );
  function actions__general() {
    // (Provided by Wordpress) Filter to make Wordpress 'Read More' button more accessible    
    add_filter( 'the_content_more_link', function( $html ) {
      $search_str = '/<a(.*)>(.*)<\/a>/iU';
      $replace_str = sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) );
      return preg_replace( $search_str, $replace_str, $html );  
    } );
  }
  function actions__theme() {
    // Theme supports
    add_action( 'after_setup_theme', function() {
      add_theme_support( 'post-thumbnails' );
      add_theme_support( 'title-tag' );
    } );
    // Stylesheets and JS files for front end (client view)
    add_action( 'wp_enqueue_scripts', function() {
      $style_url = get_template_directory_uri() . '/css/';
      $styles = constant( __CLASS__ . "::STYLES" );
      foreach ( $styles as $style ) {
        wp_enqueue_style(
          'urbanheat-' . $style,
          $style_url . $style . '.css'
        );
      }
      $script_url = get_template_directory_uri() . '/js/';
      $scripts = constant( __CLASS__ . "::SCRIPTS" );
      foreach ( $scripts as $script ) {
        wp_enqueue_script(
          'urbanheat-' . $script,
          $script_url . $script . '.js'
        );
      }
    } );
    // Stylesheets and JS files for wordpress editor pages
    add_action( 'enqueue_block_editor_assets', function() {

    } );
    add_action( 'init', function() {
      $menu_locations = array(
        'primary'   => 'Primary menu',
        'footer'    => 'Footer menu',
        'socials'   => 'Social links',
      );
      register_nav_menus( $menu_locations );
    } );
  }
  function filters__theme() {
    add_filter( 'wp_nav_menu_objects', function( $items, $args ) {
      if ( $args->menu == 'primary' ) {
        foreach ( $items as $item ) {
          array_push( 
            $item->classes, 
            'menu-link',
            'menu--primary__link-item', 
            'link-chain__link-item', 
            'link-chain--flush-right__link-item' 
          );
        }
      }
      if ( $args->menu == 'footer' ) {
        foreach ( $items as $item ) {
          array_push( 
            $item->classes, 
            'menu--footer__link-item'
          );
        }
      }
      if ( $args->menu == 'socials' ) {
        foreach ( $items as $item ) {
          array_push( 
            $item->classes, 
            'menu--socials__link-item'
          );
        }
      }
      return $items;
    }, 10, 2 );
  }
  function __construct() {
    $this->actions__general();
    $this->actions__theme();
    $this->filters__theme();
  }
}
