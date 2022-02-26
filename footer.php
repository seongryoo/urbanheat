<?php wp_footer(); ?>

<footer class="footer">
  <div class="footer__footer-content contained">
    <nav aria-labelledby="label_footernav">
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