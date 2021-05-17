<?php get_header(); ?>

<nav class="breadcrumb contained" aria-label="Breadcrumb">
  <ul>
  <?php
    $subpages = crumb();
    foreach ( $subpages as $crumb ) {
      $html = '<li>';
        $html .= '<a href="' . esc_url( $crumb['url'] ) . '">';
        $html .= esc_html( $crumb['title'] );
        $html .= '</a>';
      $html .= '</li>';
      echo $html;
    }
  ?>
  </ul>
</nav>

<main id="content">
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
      
      <div class="mini-hero">
        <div class="contained">
          <h1><?php the_title(); ?></h1>
        </div>
        <div class="mini-hero-bg"></div>
      </div>

      <div class="blocks contained">
        <?php the_content(); ?>
      </div>
      <?php
    }
  }
  ?>
</main>

<?php get_footer(); ?>