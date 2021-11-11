<?php get_header(); ?>

<main id="content">
  <h1 class="visually-hidden">Urban Heat ATL Home Page</h1>
  <section class="hero front-hero">
    <img 
      class="hero-bg" 
      src="<?php echo get_template_directory_uri() . '/img/atl-street.jpg' ?>" 
      alt="A photograph of Jesse Hill Jr. Street in Atlanta, Georgia. Across the street, a mural of the late John Lewis towers. On the street below, a poster reads &ldquo;Honor the vote&rdquo; in bold letters. Photograph by Greg Keelen."
    >

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