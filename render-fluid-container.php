<?php

/* Block registration functions ----------------------- */

function oppidan_register_group_block() {
  if ( ! function_exists( 'register_block_type' ) ) {
    return;
  }
  
  $register_args = array(
    'attributes' => array(
      'content' => array(
        'type' => 'string',
      ),
      'className' => array(
        'type' => 'string',
      ),
    ),
    'render_callback' => 'oppidan_group_block_render',
  );

  register_block_type( 'oppidan/fluid-container', $register_args );

}

add_action( 'init', 'oppidan_register_group_block' );

/* Render functions ----------------------- */

function oppidan_group_block_render( $attributes, $content ) {
  $markup = '';
  $markup .= '<div class="fluid-container">';
    $markup .= $content;
  $markup .= '</div>';
  
  return $markup;
}