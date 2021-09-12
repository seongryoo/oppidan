<?php get_header(); ?>

<main id="content">
  <h1 class="visually-hidden">Urban Heat ATL Home Page</h1>
  <section class="hero front-hero">
    <div class="hero-bg">
    </div>

    <div class="contained">
      <div class="hero-text">
        <h2>We&rsquo;re mapping Atlanta&rsquo;s urban heat islands with community science.</h2>
        <div class="cta-wrapper">
          <a class="call-to-action primary" href="/get-involved">
            Get involved
          </a>
        </div>
      </div>
    </div>

    <!-- <div class="ekg-container">
      <img alt="A digital illustration of the Atlanta skyline. The skyline is drawn with a light blue color, representing cooler temperatures. As the outline of the skyline is drawn, however, the line transforms into a warmer red." src="<?php echo get_template_directory_uri(); ?>/img/skyline.svg" class="ekg">
    </div> -->
  </section>
  <div class="blocks contained narrow">
  	<?php
  	  if ( have_posts() ) {
  	  	while ( have_posts() ) {
  	  	  the_post(); ?>
  	  	  <?php the_content(); ?>
  	  	  <?php
  	  	}
  	  }
  	?>
  </div><!--.contained-->
</main>

<?php get_footer(); ?>