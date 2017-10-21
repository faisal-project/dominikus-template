<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package dominikus
 */
get_header();
?>

<section id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <div class="lpm-row padding">
      <div class="lpm-col-8">
        <?php if (have_posts()) : ?>

          <header class="page-header">
            <h1 class="page-title" style="margin-bottom:0.25em;"><?php printf(esc_html__('Suchergebnisse für: %s', 'dominikus'), '<span>' . get_search_query() . '</span>'); ?></h1>
          </header>

          <?php
          while (have_posts()) : the_post();
            get_template_part('template-parts/content', 'search');
          endwhile;
          the_posts_navigation();
        else :
          get_template_part('template-parts/content', 'none');
        endif;
        ?>
      </div>
    </div>

  </main>
</section>

<?php
get_footer();