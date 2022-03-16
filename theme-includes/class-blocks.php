<?php

include( plugin_dir_path( __FILE__ ) . '../editor/renders/hero.php' );

class UrbanHeatATL_Blocks {
  const STYLES = array(
    'admin',
    'hero',
  );
  const SITE_STYLES = array(
    'fonts'
  );
  const SCRIPTS = array(
    'blocks',
  );
  const DEPENDENCIES = array(
    'wp-blocks',
    'wp-i18n',
    'wp-editor',
    'wp-date',
  );
  function actions__editor() {
    add_action( 'enqueue_block_editor_assets', function() {
      $styles = constant( __CLASS__ . '::STYLES' );
      $scripts = constant( __CLASS__ . '::SCRIPTS' );
      $dependencies = constant( __CLASS__ . '::DEPENDENCIES' );
      $style_url = get_template_directory_uri() . '/editor/css/';
      $script_url = get_template_directory_uri() . '/editor/js/';
      foreach ( $styles as $style ) {
        wp_enqueue_style(
          'urbanheat-' . $style, 
          $style_url . $style . '.css' 
        );
      }
      foreach ( $scripts as $script ) {
        wp_enqueue_script(
          'urbanheat-' . $script,
          $script_url . $script . '.js',
          $dependencies
        );
      }
      $site_style_url = get_template_directory_uri() . '/css/build/';
      $site_styles = constant( __CLASS__ . "::SITE_STYLES" );
      foreach ( $site_styles as $site_style ) {
        wp_enqueue_style(
          'urbanheat-' . $site_style,
          $site_style_url . $site_style . '.css'
        );
      }
    } );
  }
  function filters__editor() {
    
  }
  function __construct() {
    $this->actions__editor();
    $this->filters__editor();
  }
}