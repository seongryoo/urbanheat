<?php get_header(); ?>

<main id="main">
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
      
        <h1 class="visually-hidden">
          <?php _e( 'Urban Heat ATL home', 'urbanheat' ); ?>
        </h1>

        <div class="the-content">
          <?php the_content(); ?>
        </div>
      <?php
    }
  }
  ?>
</main>

<?php get_footer(); ?>