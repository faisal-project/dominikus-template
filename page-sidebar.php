<?php
/**
 * Template Name: Seite + Sidebar
 * The template for the sidebar single page template
 *
 * @package dominikus
 */
get_header();
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <?php
    while (have_posts()) : the_post();
        
      get_template_part('template-parts/content-single', get_post_format());

      // If comments are open or we have at least one comment, load up the comment template.
      if (comments_open() || get_comments_number()) :
        comments_template();
      endif;

    endwhile;
    ?>

  </main>
</div>

<?php
get_footer();