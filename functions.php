<?php

/**
 * dominikus functions and definitions
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 * @package dominikus
 */
if (!function_exists('dominikus_setup')) :

  function dominikus_setup() {
    load_theme_textdomain('dominikus', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(array(
        'menu-1' => esc_html__('Primary', 'dominikus'),
        'sitemap' => esc_html__('Sitemap', 'dominikus'),
    ));

    /*
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));

    // Set up the WordPress core custom background feature.
    add_theme_support('custom-background', apply_filters('dominikus_custom_background_args', array(
        'default-color' => 'ffffff',
        'default-image' => '',
    )));

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');
  }

endif;
add_action('after_setup_theme', 'dominikus_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function dominikus_content_width() {
  $GLOBALS['content_width'] = apply_filters('dominikus_content_width', 640);
}

add_action('after_setup_theme', 'dominikus_content_width', 0);

/**
 * Register widget area.
 */
function dominikus_widgets_init() {
  register_sidebar(array(
      'name' => esc_html__('Footer 1', 'dominikus'),
      'id' => 'footer-1',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
  register_sidebar(array(
      'name' => esc_html__('Footer 2', 'dominikus'),
      'id' => 'footer-2',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
  register_sidebar(array(
      'name' => esc_html__('Footer 3', 'dominikus'),
      'id' => 'footer-3',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
  register_sidebar(array(
      'name' => esc_html__('Footer 4', 'dominikus'),
      'id' => 'footer-4',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));

  // single post sidebar
  register_sidebar(array(
      'name' => esc_html__('Post Sidebar', 'dominikus'),
      'id' => 'postsidebar',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
  // single page sidebar
  register_sidebar(array(
      'name' => esc_html__('Seite Sidebar', 'dominikus'),
      'id' => 'pagesidebar',
      'description' => esc_html__('Add widgets here.', 'dominikus'),
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget' => '</section>',
      'before_title' => '<h2 class="widget-title">',
      'after_title' => '</h2>',
  ));
}

add_action('widgets_init', 'dominikus_widgets_init');

/**
 * Register custom post types & admin pages.
 */
add_action("admin_menu", "dominikus_adminsettings");

function dominikus_adminsettings() {
  add_menu_page('Elemente', 'Elemente', 'edit_posts', 'snippets', 'snippets', 'dashicons-media-document', 21);
}

add_action('init', 'create_post_type');

function create_post_type() {
  register_post_type('dominikus_infozeile', array(
      'labels' => array(
          'name' => __('Infozeile'),
          'singular_name' => __('Infozeile')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-info',
      'show_ui' => true,
      'show_in_menu' => 'snippets'
          )
  );
  register_post_type('dominikus_accordion', array(
      'labels' => array(
          'name' => __('Akkordion'),
          'singular_name' => __('Akkordion')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-info',
      'show_ui' => true,
      'show_in_menu' => 'snippets'
          )
  );
  register_post_type('dominikus_textaccor', array(
      'labels' => array(
          'name' => __('Text Akkordion'),
          'singular_name' => __('Akkordion')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-info',
      'show_ui' => true,
      'show_in_menu' => 'snippets'
          )
  );
  register_post_type('dominikus_team', array(
      'labels' => array(
          'name' => __('Teamgalerie'),
          'singular_name' => __('Teamgalerie')
      ),
      'public' => true,
      'has_archive' => true,
      'menu_icon' => 'dashicons-info',
      'show_ui' => true,
      'show_in_menu' => 'snippets'
          )
  );
}

// add ACF options page to edit the last slide of the quote gallery
if (function_exists('acf_add_options_page')) {

  $option_page = acf_add_options_page(array(
      'page_title' => 'Bewertungsgalerie Optionen',
      'menu_title' => 'Bewertungsgalerie',
      'parent_slug' => 'options-general.php',
      'capability' => 'edit_posts',
      'redirect' => false
  ));
}

/**
 * Enqueue scripts and styles.
 */
function dominikus_scripts() {
  wp_enqueue_style('dominikus-style', get_stylesheet_uri());

  wp_enqueue_script('dominikus-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true);

  wp_enqueue_script('dominikus-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true);

  wp_register_script('dominikus-equalheights', get_template_directory_uri() . '/js/jquery-equalheights.min.js', '', '', true);
  wp_enqueue_script('dominikus-equalheights');

  wp_register_script('dominikus-slick', get_template_directory_uri() . '/js/slick.min.js', '', '', true);
  wp_enqueue_script('dominikus-slick');

  wp_register_script('dominikus-main', get_template_directory_uri() . '/js/main.js', '', '1.0', true);
  wp_enqueue_script('dominikus-main');

  if (is_singular() && comments_open() && get_option('thread_comments')) {
    wp_enqueue_script('comment-reply');
  }
}

add_action('wp_enqueue_scripts', 'dominikus_scripts');

/**
 * Display shortcode+ID on infozeile custom posts
 */
function infozeile_add_id_column($columns) {
  $columns['dominikus_id'] = 'Shortcode';
  return $columns;
}

function infozeile_id_column_content($column, $id) {
  if ('dominikus_id' == $column) {
    echo '<span class="shortcode">'
    . '<input class="large-text code" onfocus="this.select();" readonly="readonly" value="[lpm_infozeile title=' . get_the_title() . ']' . $id . '[/lpm_infozeile]"/>'
    . '</span>';
  }
}

add_filter('manage_dominikus_infozeile_posts_columns', 'infozeile_add_id_column', 5);
add_action('manage_dominikus_infozeile_posts_custom_column', 'infozeile_id_column_content', 5, 2);

function infozeile_column_register_sortable($columns) {
  $columns['dominikus_id'] = 'dominikus_id';

  return $columns;
}

add_filter('manage_edit-dominikus_infozeile_sortable_columns', 'infozeile_column_register_sortable');

function infozeile_orderby($vars) {
  if (isset($vars['orderby']) && 'dominikus_id' == $vars['orderby']) {
    $vars = array_merge($vars, array(
        'meta_key' => 'dominikus_id',
        'orderby' => 'meta_value_num'
    ));
  }

  return $vars;
}

add_filter('infozeile_order', 'infozeile_orderby');

/**
 * Display shortcode+ID on akkordion custom posts
 */
function akkordion_add_id_column($columns) {
  $columns['dominikus_id'] = 'Shortcode';
  return $columns;
}

function akkordion_id_column_content($column, $id) {
  if ('dominikus_id' == $column) {
    $title = get_the_title();
    echo '<span class="shortcode">'
    . '<input class="large-text code" onfocus="this.select();" readonly="readonly" value="[lpm_akkordion title=' . get_the_title() . ']' . $id . '[/lpm_akkordion]"/>'
    . '</span>';
  }
}

add_filter('manage_dominikus_accordion_posts_columns', 'akkordion_add_id_column', 5);
add_action('manage_dominikus_accordion_posts_custom_column', 'akkordion_id_column_content', 5, 2);

function akkordion_column_register_sortable($columns) {
  $columns['dominikus_id'] = 'dominikus_id';

  return $columns;
}

add_filter('manage_edit-dominikus_accordion_sortable_columns', 'akkordion_column_register_sortable');

function accordion_orderby($vars) {
  if (isset($vars['orderby']) && 'dominikus_id' == $vars['orderby']) {
    $vars = array_merge($vars, array(
        'meta_key' => 'dominikus_id',
        'orderby' => 'meta_value_num'
    ));
  }

  return $vars;
}

add_filter('accordion_order', 'accordion_orderby');

/**
 * Display shortcode+ID on textakkordion custom posts
 */
function textaccor_add_id_column($columns) {
  $columns['dominikus_id'] = 'Shortcode';
  return $columns;
}

function textaccor_id_column_content($column, $id) {
  if ('dominikus_id' == $column) {
    echo '<span class="shortcode">'
    . '<input class="large-text code" onfocus="this.select();" readonly="readonly" value="[lpm_textakkordion title=' . get_the_title() . ']' . $id . '[/lpm_textakkordion]"/>'
    . '</span>';
  }
}

add_filter('manage_dominikus_textaccor_posts_columns', 'textaccor_add_id_column', 5);
add_action('manage_dominikus_textaccor_posts_custom_column', 'textaccor_id_column_content', 5, 2);

function textaccor_column_register_sortable($columns) {
  $columns['dominikus_id'] = 'dominikus_id';

  return $columns;
}

add_filter('manage_edit-dominikus_textaccor_sortable_columns', 'textaccor_column_register_sortable');

function textaccor_orderby($vars) {
  if (isset($vars['orderby']) && 'dominikus_id' == $vars['orderby']) {
    $vars = array_merge($vars, array(
        'meta_key' => 'dominikus_id',
        'orderby' => 'meta_value_num'
    ));
  }

  return $vars;
}

add_filter('textaccor_order', 'textaccor_orderby');

/**
 * Display shortcode+ID on teamgalerie custom posts
 */
function teamgallerie_add_id_column($columns) {
  $columns['dominikus_id'] = 'Shortcode';
  return $columns;
}

function teamgallerie_id_column_content($column, $id) {
  if ('dominikus_id' == $column) {
    echo '<span class="shortcode">'
    . '<input class="large-text code" onfocus="this.select();" readonly="readonly" value="[lpm_teamgalerie title=' . get_the_title() . ']' . $id . '[/lpm_teamgalerie]"/>'
    . '</span>';
  }
}

add_filter('manage_dominikus_team_posts_columns', 'teamgallerie_add_id_column', 5);
add_action('manage_dominikus_team_posts_custom_column', 'teamgallerie_id_column_content', 5, 2);

function teamgallerie_column_register_sortable($columns) {
  $columns['dominikus_id'] = 'dominikus_id';

  return $columns;
}

add_filter('manage_edit-dominikus_team_sortable_columns', 'teamgallerie_column_register_sortable');

function teamgallerie_orderby($vars) {
  if (isset($vars['orderby']) && 'dominikus_id' == $vars['orderby']) {
    $vars = array_merge($vars, array(
        'meta_key' => 'dominikus_id',
        'orderby' => 'meta_value_num'
    ));
  }

  return $vars;
}

add_filter('teamgallerie_order', 'teamgallerie_orderby');

/**
 * Custom search widget
 */
function dominikus_form($form) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url('/') . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s" placeholder="Suche ..." />
    </form>';

  return $form;
}

add_filter('get_search_form', 'dominikus_form', 100);

/**
 * Fix comment form order
 */
function wpb_move_comment_field_to_bottom($fields) {
  $comment_field = $fields['comment'];
  unset($fields['comment']);
  $fields['comment'] = $comment_field;
  return $fields;
}

add_filter('comment_form_fields', 'wpb_move_comment_field_to_bottom');

/**
 * Underscores included files
 */
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/extras.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/jetpack.php';

/**
 * Custom additions
 */
require get_template_directory() . '/inc/breadcrumbs.php';
require get_template_directory() . '/inc/admin-styling.php';
require get_template_directory() . '/inc/custom-admin.php';
require get_template_directory() . '/inc/custom-comments.php';
require get_template_directory() . '/inc/tgm-plugin-activation.php';

/**
 * Theme shortcodes - might require Dominikus Shortcodes plugin
 */
require get_template_directory() . '/inc/shortcodes/shortcode-infozeile.php';
require get_template_directory() . '/inc/shortcodes/shortcode-accordion.php';
require get_template_directory() . '/inc/shortcodes/shortcode-textaccordion.php';
require get_template_directory() . '/inc/shortcodes/shortcode-quotegallery.php';
require get_template_directory() . '/inc/shortcodes/shortcode-teamgallery.php';

/**
 * Missing required plugin notifications
 */
function alx_plugins() {
  $plugins = array(
      array(
          'name' => 'Contact Form 7',
          'slug' => 'contact-form-7',
      ),
      array(
          'name' => 'Advanced Custom Fields: Accordion Tab Field',
          'slug' => 'acf-accordion',
      ),
      array(
          'name' => 'Advanced Custom Fields: Nav Menu Field',
          'slug' => 'advanced-custom-fields-nav-menu-field',
      ),
  );
  tgmpa($plugins);
}
