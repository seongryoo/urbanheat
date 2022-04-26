<?php wp_footer(); ?>

<footer class="footer">
  <div class="footer__footer-content">
    <div class="contained windsock">
      <a href="/" class="windsock__image windsock__left logo-link">
        <img
          src="<?php echo get_template_directory_uri(); ?>/img/logo.png"
          alt="Urban Heat ATL"
          width="100"
          height="100"
          class="logo-link__img windsock__image__img"
        >
      </a>
      <div class="windsock__content windsock__right inverted">
        <div class="site-title-wrapper--footer">
          <a href="/" class="site-title site-title--footer">
            UrbanHeatATL
          </a>
        </div>
        <div class="flex-row flex-row--stretched">
          <div class="flex-row__bead flex-row--stretched__bead">
            <nav aria-labelledby="label_footernav">
              <span id="label_footernav" class="aria-labelledby" aria-hidden="true">
                <?php _e( 'Footer links', 'urbanheat' ); ?>
              </span>
              <?php
                wp_nav_menu( array(
                  'theme_location'          => 'footer',
                  'depth'                   => 1,
                  'container'               => false,
                  'menu_class'              => 'menu menu--footer',
                ) );
              ?>
            </nav>
          </div>
          <div class="flex-row__bead flex-row--stretched__bead">
            <nav aria-labelledby="label_socialnav">
              <span id="label_socialnav" class="aria-labelledby" aria-hidden="true">
                <?php _e( 'Social media links', 'urbanheat' ); ?>
              </span>
              <?php
                wp_nav_menu( array(
                  'theme_location'          => 'socials',
                  'depth'                   => 1,
                  'container'               => false,
                  'menu_class'              => 'menu menu--footer menu--socials',
                ) );
              ?>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <div class="contained content-bar action-items inverted">
      <nav aria-labelledby="label_actionitems">
        <span id="label_actionitems" class="aria-labelledby" aria-hidden="true">
          <?php _e( 'Action items', 'urbanheat' ); ?>
        </span>
        <?php
          wp_nav_menu( array(
            'theme_location'          => 'action-items',
            'depth'                   => 1,
            'container'               => false,
            'menu_class'              => 'menu menu--action-items link-chain link-chain--flush-left',
          ) );
        ?>
      </nav>
    </div>
  </div>
</footer>


</body>
</html>