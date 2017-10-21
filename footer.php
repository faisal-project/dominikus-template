<?php
/**
 * The template for displaying the footer
 * Contains the closing of the #content div and all content after.
 *
 * @package dominikus
 */
?>

</div>
<section id="prefooter">
  <div class="border"></div>
  <div class="divider"></div>
</section>
<section id="footer">
  <div class="lpm-row">
    <div class="lpm-col-3" id="footer-1">
      <?php if (is_active_sidebar('footer-1')) : ?>
        <?php dynamic_sidebar('footer-1'); ?>
      <?php endif; ?>
    </div>
    <div class="lpm-col-3" id="footer-2">
      <?php if (is_active_sidebar('footer-2')) : ?>
        <?php dynamic_sidebar('footer-2'); ?>
      <?php endif; ?>
    </div>
    <div class="lpm-col-3" id="footer-3">
      <?php if (is_active_sidebar('footer-3')) : ?>
        <?php dynamic_sidebar('footer-3'); ?>
      <?php endif; ?>
    </div>
    <div class="lpm-col-3" id="footer-4">
      <?php if (is_active_sidebar('footer-4')) : ?>
        <?php dynamic_sidebar('footer-4'); ?>
      <?php endif; ?>
    </div>
  </div>

  <a href="#" class="backtotop"></a>
</section>
</div>

<?php wp_footer(); ?>

</body>
</html>
