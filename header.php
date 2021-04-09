<!DOCTYPE html>

<html <?php language_attributes(); ?>>

<head>

  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>

  <a href="#content" class="skip-link">
    Skip to main content
  </a>

  <header class="header" id="strudel-header">
    <div class="contained">
      <div class="site-title">
        <a href="/" class="site-title-link">
          <span aria-hidden="true">#UrbanHeatATL</span>
          <span class="visually-hidden">Hashtag Urban Heat ATL</span>
        </a>
      </div>

      <button
        aria-label="Open main navigation menu"
        class="hamburger"
        aria-controls="nav-menu"
        aria-expanded="false"
        id="strudel-burger"
      >
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

      <nav class="nav" id="navbar" aria-label="Primary menu" role="navigation">
        <ul id="nav-menu">
          <?php
            if ( has_nav_menu( 'primary' ) ) {
              wp_nav_menu(
                array(
                  'container' => '',
                  'items_wrap' => '%3$s',
                  'theme_location' => 'primary',
                )
              );
            }
          ?>
        </ul>
      </nav>

      <div class="dark-overlay" id="strudel-overlay" aria-hidden="true"></div>
      <div class="false-nav" aria-hidden="true"></div>
    </div>
  </header>