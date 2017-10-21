<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package dominikus
 */
?>

<div id="comments" class="comments-area">
  <div class="lpm-row padding">
    <div class="lpm-col-6">
      <?php the_content(); ?>
    </div>
    <div class="lpm-col-6">
      <?php
      $args = array(
          'label_submit' => __('Senden'),
          'comment_notes_before' => '',
          'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true" placeholder="Ihr Text"></textarea></p>',
      );
      comment_form($args);
      ?>
    </div>
  </div>
  <div class="lpm-row padding">
    <div class="lpm-col-10">
      <?php if (have_comments()) : ?>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
          <nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'dominicus'); ?></h2>
            <div class="nav-links">

              <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'dominicus')); ?></div>
              <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'dominicus')); ?></div>

            </div>
          </nav>
        <?php endif; ?>

        <?php
        wp_list_comments('callback=dominikus_comment');
        ?>

        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
          <nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
            <h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'dominicus'); ?></h2>
            <div class="nav-links">

              <div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'dominicus')); ?></div>
              <div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'dominicus')); ?></div>

            </div>
          </nav>
          <?php
        endif;

      endif;
      ?>

    </div>
  </div>
</div>
