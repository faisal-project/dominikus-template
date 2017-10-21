<?php
/**
 * The template for displaying all pages
 *
 * @package dominikus
 */
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
    while (have_posts()) : the_post();

      if (! comments_open()) :
        get_template_part('template-parts/content', 'page');
      endif;
      
      // If comments are open or we have at least one comment, load up the comment template.
      if (comments_open() || get_comments_number()) :
        get_template_part('template-parts/content', 'title');
        comments_template();
      endif;

    endwhile; // End of the loop.
    ?>

  </main>
</div>

<?php
get_footer();
