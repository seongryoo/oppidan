<footer role="contentinfo" class="footer">

  <div class="footer-title contained">
    <div class="site-title">
      <a href="/" class="site-title-link">
        <span aria-hidden="true">#UrbanHeatATL</span>
        <span class="visually-hidden">Hashtag Urban Heat ATL</span>
      </a>
    </div>
  </div>

  <div class="footer-menus contained">
    <nav role="navigation" aria-label="Social media links">
      <ul>
        <?php
          if ( has_nav_menu( 'socials' ) ) {
            wp_nav_menu(
              array(
                'container_class' => 'footer-socials',
                'items_wrap' => '%3$s',
                'theme_location' => 'socials',
              )
            );
          }
        ?>
      </ul>
    </nav>

    <nav role="navigation" aria-label="Important site links">
    	<ul>
    	  <?php
    	    if ( has_nav_menu( 'footer' ) ) {
    	      wp_nav_menu(
    	      	array(
    	      	  'container_class' => 'footer-links',
    	      	  'items_wrap' => '%3$s',
                'theme_location' => 'footer',
    	      	)
    	      );
    	    }
     	  ?>
      </ul>
    </nav>
  </div>

  <div class="image-credit contained">
    <p>
      Banner photograph by Greg Keelen
    </p>
  </div>
</footer>

<?php wp_footer(); ?>

</body>

</html>