<?php

class HeroBlock {
  const BLOCK_NAME = 'urbanheat/hero-block';
  const ATTRIBUTES = array(
    'sideText' => array(
      'type' => 'string'
    ),
    'sideImageId' => array(
      'type' => 'string'
    ),
    'sideImageUrl' => array(
      'type' => 'string'
    ),
    'sideImageAlt' => array(
      'type' => 'string'
    ),
    'isImageLeft' => array(
      'type' => 'boolean',
      'default' => TRUE,
    ),
  );
  function render_block( $attributes, $content ) {
    // Attribute retrieval
    $side_text = $attributes[ 'sideText' ];
    $is_image_left = $attributes[ 'isImageLeft' ];
    
    // Markup generation for text and image sides
    $text_content = $side_text;
    $image_content = 'img';

    // Image/text direction setting
    if ( $is_image_left  ) {
      $left_content = $image_content;
      $right_content = $text_content;
    } else {
      $left_content = $text_content;
      $right_content = $image_content;
    }

    return "<div class=\"hero\">
              <div class=\"hero__left-content\">
                {$left_content}
              </div>
              <div class=\"hero__right-content\">
                {$right_content}
              </div>
            </div>";
  }
  function actions__init() {
    add_action( 'init', function() {
      if ( ! function_exists( 'register_block_type' ) ) {
        return;
      }
      register_block_type( constant( __CLASS__ . '::BLOCK_NAME' ), 
        array(
          'attributes' => constant( __CLASS__ . '::ATTRIBUTES' ),
          'render_callback' => array( $this, 'render_block' ),
        ) 
      );
    } );
  }
  function __construct() {
    $this->actions__init();
  }
}

$hero_block = new HeroBlock();