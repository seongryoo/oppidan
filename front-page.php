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

    <div class="ekg-container">
      <img alt="" src="<?php echo get_template_directory_uri(); ?>/img/ekg.svg" class="ekg">
    </div>
  </section>
  <div class="contained narrow">
    <div class="wide duo">
      <div><img src="<?php echo get_template_directory_uri(); ?>/img/torch.png"></div>
      <div>
      Because heat extremes disproportionately affect the most vulnerable community members, and are particularly deadly in densely populated urban centers such as Atlanta, the UrbanHeatATL team is launching its urban heat mapping initiative as part of the Atlanta Science Festival. The interactive citizen science event will investigate temperature throughout Atlanta, by lending DIY temperature sensors to students, who will track temperature over several months, through the hottest months of summer, when urban heat islands are the most pronounced. 
      </div>
    </div>
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