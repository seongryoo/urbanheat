<?php wp_footer(); ?>

<footer class="footer">
  <div class="footer__footer-content contained windsock">
    <a href="/" class="windsock__image windsock__left logo-link">
      <img
        src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
        alt="Urban Heat ATL"
        width="100"
        height="100"
        class="logo-link__img windsock__image__img"
      >
    </a>
    <nav aria-labelledby="label_footernav" class="windsock__content windsock__right">
      <span id="label_footernav" class="aria-labelledby" aria-hidden="true">
        <?php _e( 'Footer navigation', 'urbanheat' ); ?>
      </span>
      <?php
        wp_nav_menu( array(
          'menu'          => 'footer',
          'depth'         => 1,
          'container'     => false,
          'menu_class'    => 'menu menu--footer',
        ) );
      ?>
    </nav>
  </div>
</footer>


</body>
</html>