<?php

$guten_scripts = array(
  'fluid-container',
);
$scripts = array(
  'strudel',
  'nav',
);
$dependencies = array();
$guten_styles = array(
  'guten-styles',
  'admin-render-both',
);
$stylesheets = array(
  'fonts',
  'sitewide',
  'elements',
  'home',
  'header',
  'footer',
  'superberg',
  'superelementor',
  'admin-render-both',
);

// Assets file loads in js and css needed to render blocks in WP editor
include( plugin_dir_path( __FILE__ ) . 'render-fluid-container.php' );

// Add page slug to the body class
function oppidan_body_class( $classes ) {
  global $post;
  $slug = $post->post_name;
  $classes[] = 'page-' . $slug;
  return $classes;
}
add_filter( 'body_class','oppidan_body_class' );

// Theme features
function oppidan_theme_support() {
  add_theme_support( 'post-thumbnails' );
  add_theme_support( 'title-tag' );

  register_block_style(
    'core/image',
    array(
        'name'         => 'accent-shadow-cool',
        'label'        => 'Accent Shadow (Cool)',
        'style_handle' => 'admin-render-both',
    )
  );
  register_block_style(
    'core/image',
    array(
        'name'         => 'accent-shadow-warm',
        'label'        => 'Accent Shadow (Warm)',
        'style_handle' => 'admin-render-both',
    )
  );
  register_block_style(
    'core/columns',
    array(
        'name'         => 'hero',
        'label'        => 'Hero banner',
        'style_handle' => 'admin-render-both',
    )
  );
  register_block_style(
    'core/columns',
    array(
        'name'         => 'wide',
        'label'        => 'Wide',
        'style_handle' => 'admin-render-both',
    )
  );
  register_block_style(
    'core/columns',
    array(
        'name'         => 'small-img',
        'label'        => 'Small image',
        'style_handle' => 'admin-render-both',
    )
  );
}
add_action( 'after_setup_theme', 'oppidan_theme_support' );

// Style and script loading
function oppidan_enqueue() {
  $style_dir = get_template_directory_uri() . '/css/';
  global $stylesheets;

  $script_dir = get_template_directory_uri() . '/js/';
  global $scripts;
  global $dependencies;

  foreach ( $stylesheets as $slug ) {
    wp_enqueue_style( 'oppidan-' . $slug, $style_dir . $slug . '.css' );
  }

  wp_enqueue_style( 
    'oppidan-font-awesome', 
    get_template_directory_uri() . '/fonts/font-awesome-4.7.0/css/font-awesome.css'
  );

  foreach ( $scripts as $slug ) {
    wp_enqueue_script( 'oppidan-' . $slug, $script_dir . $slug, $dependencies );
  }
}
add_action( 'wp_enqueue_scripts', 'oppidan_enqueue' );

// Gutenberg assets
function oppidan_enqueue_blocks() {
  $style_dir = get_template_directory_uri() . '/css/';
  $script_dir = get_template_directory_uri() . '/js/';
  global $guten_scripts;
  global $guten_styles;
  global $dependencies;

  foreach ( $guten_styles as $slug ) {
    wp_enqueue_style( 'oppidan-' . $slug, $style_dir . $slug . '.css' );
  }
  foreach ( $guten_scripts as $slug ) {
    wp_enqueue_script( 'oppidan-' . $slug, $script_dir . $slug, $dependencies );
  }
}
add_action( 'enqueue_block_editor_assets', 'oppidan_enqueue_blocks' );

// Menu locations
function oppidan_menus() {
  $locs = array(
    'primary'   => 'Primary menu',
    'footer'    => 'Footer menu',
    'socials'   => 'Social links',
  );
  register_nav_menus( $locs );
}
add_action( 'init', 'oppidan_menus' );

// Hook for actions that need to be performed after body load
if ( ! function_exists( 'wp_body_open' ) ) {
  function wp_body_open() {
    do_action( 'wp_body_open' );
  }
}

// (Provided by Wordpress) Filter to make Wordpress 'Read More' button more accessible
function oppidan_read_more_tag( $html ) {
  $search_str = '/<a(.*)>(.*)<\/a>/iU';
  $replace_str = sprintf( '<div class="read-more-button-wrap"><a$1><span class="faux-button">$2</span> <span class="screen-reader-text">"%1$s"</span></a></div>', get_the_title( get_the_ID() ) );
  return preg_replace( $search_str, $replace_str, $html );  
}
add_filter( 'the_content_more_link', 'oppidan_read_more_tag' );

// Add type="module" to scripts
function oppidan_scripts_to_modules( $tag, $handle, $src ) {
  global $scripts;
  foreach( $scripts as $module ) {
    $the_handle = 'oppidan-' . $module;
    if ( $the_handle == $handle ) {
      return '<script type="module" src="' . esc_url( $src ) . '"></script>';
    }
  }
  return $tag;
}
add_filter('script_loader_tag', 'oppidan_scripts_to_modules' , 10, 3);

// Breadcrumbs
function crumb() {
  global $wp;
  $curr = add_query_arg( array(), $wp->request );
  $suburl = explode( '/', $curr );
  $subpages = array();
  $buildUrl = '/';
  $subpages []= array(
    'url' => '/',
    'title' => 'Home',
  );
  foreach ( $suburl as $slug ) {
    $buildUrl .= $slug . '/';
    $id = url_to_postid( $buildUrl );
    if ( $id != 0 ) {  // Checks whether the parent post is valid
      $title = get_the_title( $id );
      $subpages []= array(
        'url' => $buildUrl,
        'title' => $title,
      );
    }
  }
  return $subpages;
}