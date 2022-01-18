<?php

class HeroBlock {
  const BLOCK_NAME = 'urbanheat/hero-block';
  const ATTRIBUTES = array(

  );
  function render( $attributes, $content ) {
    return 'render';
  }
  function actions__init() {
    add_action( 'init', function() {
      if ( ! function_exists( 'register_block_type' ) ) {
        return;
      }
      register_block_type( constant( __CLASS__ . '::BLOCK_NAME' ), 
        array(
          'attributes' => constant( __CLASS__ . '::ATTRIBUTES' ),
          'render_callback' => array($this, 'render'),
        ) 
      );
    } );
  }
  function __construct() {
    $this->actions__init();
  }
}

$hero_block = new HeroBlock();