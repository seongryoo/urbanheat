<?php

include( plugin_dir_path( __FILE__ ) . '../editor/renders/hero.php' );

class UrbanHeatATL_Blocks {
  const STYLES = array(

  );
  const SCRIPTS = array(
    '_icons',
    'hero',
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
          $style_url . $style 
        );
      }
      foreach ( $scripts as $script ) {
        wp_enqueue_script(
          'urbanheat-' . $script,
          $script_url . $script,
          $dependencies
        );
      }
    } );
  }
  function filters__editor() {
    // Add type="module" to scripts
    add_filter( 'script_loader_tag', function( $tag, $handle, $src ) {
      $scripts = constant( __CLASS__ . "::SCRIPTS" );
      foreach ( $scripts as $script ) {
        if ( $handle == 'urbanheat-' . $script ) {
          return '<script type="module" src="' . esc_url( $src ) . '"></script>';
        }
      }    
      return $tag;
    }, 10, 3 );
  }
  function __construct() {
    $this->actions__editor();
    $this->filters__editor();
  }
}