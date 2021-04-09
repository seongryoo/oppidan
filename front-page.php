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
          <a class="call-to-action primary" href="">
            Get involved
          </a>
        </div>
      </div>
    </div>
  </section>
  <div class="contained">
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