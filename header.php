<?php
/**
 * The theme header
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @package dominikus
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <link rel="profile" href="http://gmpg.org/xfn/11">

    <?php wp_head(); ?>
  </head>

  <body <?php body_class(); ?>>

    <section id="header">
      <div class="tagline"><a href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_attr(get_bloginfo('name', 'display')); ?></a></div>
      <div class="logo">
        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
          <?php if (get_theme_mod('logo-upload')) : ?>
            <img src="<?php echo esc_url(get_theme_mod('logo-upload')); ?>" alt="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>">
          <?php else : ?>
            <h1><?php bloginfo('name'); ?></h1>
          <?php endif; ?>
        </a>
      </div>
      <div class="panorama">
      </div>
    </section>

    <div id="page" class="site">
      <header id="masthead" class="site-header" role="banner">
        <nav id="site-navigation" class="main-navigation" role="navigation">
          <div class="mobile-icons">
            <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo get_template_directory_uri(); ?>/images/icon-home.png" alt="Home" class="mobile-home" /></a><img src="<?php echo get_template_directory_uri(); ?>/images/icon-phone.png" alt="Anrufen" class="mobile-phone" /><img src="<?php echo get_template_directory_uri(); ?>/images/icon-mail.png" alt="Mailen" class="mobile-mail" /><img src="<?php echo get_template_directory_uri(); ?>/images/icon-search.png" alt="Suchen" class="mobile-search" />
          </div>
          <div class="mobile-fields">
            <div class="fields phonediv hidden">
              <span style="width:120px;display:inline-block;">Zentrale</span> 030/ 4092 -0<br/>
              <span style="width:120px;display:inline-block;">Rettungsstelle</span> 030/ 4092 -390
            </div>
            <div class="fields maildiv hidden">
              Senden Sie uns eine <a href="mailto:info@dominikus-berlin.de">Nachricht</a>
            </div>
            <div class="fields searchdiv hidden">
              <?php get_search_form(); ?>
            </div>
          </div>
          <button class="menu-toggle"><?php echo '<img src="' . get_template_directory_uri() . '/images/icon-menu.png" alt="Anrufen" class="mobile-menu" />'; ?></button>
          <?php get_template_part('template-parts/content-menu'); ?>
        </nav>

        <?php
        wp_nav_menu(array(
            'menu' => 'menu mobile',
            'menu_id' => 'primary-menu',
        ));
        ?>

      </header>

      <div id="content" class="site-content">
