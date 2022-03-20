<?php get_header(); ?>

<main id="main">
  <?php if ( have_posts() ) {
    while ( have_posts() ) {
      the_post(); ?>
      

        <div class="contained">
          <h1 class="heading--post-title">
            <?php the_title(); ?>
          </h1>
          <?php the_content(); ?>
          <p>Welcomet o the news</p>
        </div>
      <?php
    }
  }
  ?>
</main>

<?php get_footer(); ?>