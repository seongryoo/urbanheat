<?php get_header(); ?>

<main id="main">
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
      
        <h1 class="visually-hidden">
          Urban Heat ATL home
        </h1>

        <div class="contained">
          <?php the_content(); ?>
        </div>
      <?php
    }
  }
  ?>
</main>

<?php get_footer(); ?>