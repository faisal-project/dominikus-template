<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package dominicus
 */
get_header();

if (!is_front_page()) {
  get_template_part('template-parts/content', 'title');
}
?>

<div id="primary" class="content-area">
  <main id="main" class="site-main" role="main">

    <section id="page">
      <div class="lpm-row">
        <div class="lpm-col-8">
          <h2>Entschuldigung, dies hätte nicht passieren dürfen.</h2>
          <p style="font-size:18px;padding:10px 0;">Diese Seite existiert nicht.<br/>
            Bitte wählen Sie für Ihre weitere Suche die Suchfunktion,<br/> die aufgeführten Links oder nutzen Sie das Menü.</p>
          <p style="font-size:18px;padding:10px 0;">Bei weiteren Fragen stehen wir Ihnen gerne zur Verfügung.</p>
          <p style="font-size:18px;color:#B20D11;padding:10px 0;">Ihr Dominikus-Krankenhaus in Berlin-Hermsdorf</p>

          <p style="font-size:20px;padding:35px 0 0 0;font-weight:700;text-align:center;">Zentrale 030/ 4092 -0</p>
          <p style="font-size:20px;color:#B20D11;font-weight:700;text-align:center;">Rettungsstelle 030/ 4092 -390</p>
        </div>
        <div class="lpm-col-4">
          <h2>Suchen</h2>
          <?php get_search_form(); ?>
        </div>
      </div>

      <div class="lpm-row padding">
        <div class="lpm-col-12">
          <?php echo do_shortcode('[lpm_infozeile title=Infozeile Startseite]372[/lpm_infozeile]'); ?>
        </div>
      </div>
    </section>

  </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
