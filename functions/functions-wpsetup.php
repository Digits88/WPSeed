<?php
/**
 * WordPress Setup including
 * Menus, Theme-Supports and General Settings
 *
 * @author      Flurin Dürst
 * @version     1.5
 * @since       WPSeed 0.1.5
 *
 */


/* THEME SETUP
/===================================================== */

  /* SETUP WP-MENUS
  /------------------------*/

  // » https://codex.wordpress.org/Function_Reference/register_nav_menus
  function register_theme_menus() {
    register_nav_menus([
      'mainmenu' => __('Hauptmenü'),
      'submenu' => __('Untermenü')
    ]);
  }
  add_action( 'init', 'register_theme_menus' );


/* THEME SUPPORT
/===================================================== */

  /* GENERAL
  /---------------------------------*/
  function wpseed_theme_features()  {

    // Enable plugins to manage the document title
    // » http://codex.wordpress.org/Function_Reference/add_theme_support#Title_Tag
    add_theme_support( 'title-tag' );

    // Add Theme Support for Menus
    // » http://codex.wordpress.org/Navigation_Menus
    add_theme_support('menus');

    // Add Theme Support for Post thumbnails
    // » http://codex.wordpress.org/Post_Thumbnails
    // » http://codex.wordpress.org/Function_Reference/set_post_thumbnail_size
    // » http://codex.wordpress.org/Function_Reference/add_image_size
    add_theme_support('post-thumbnails');

  }
  add_action( 'after_setup_theme', 'wpseed_theme_features' );


/* GENERAL SETTINGS
/===================================================== */

  /* Time, Locale, Language
  /------------------------*/
  // Define Local Time, Date and Language-Location
  // » http://php.net/manual/de/function.setlocale.php
  setlocale(LC_ALL, 'de_CH.UTF-8');

  // Load theme textdomain (based on locale de_CH)
  // » https://codex.wordpress.org/Function_Reference/load_theme_textdomain
  load_theme_textdomain('WPSeed', get_template_directory() . '/languages');

  /* Disable Backend Theme-Editor
  /------------------------------*/
  function remove_editor_menu() {
    remove_action('admin_menu', '_add_themes_utility_last', 101);
  }
  add_action('_admin_menu', 'remove_editor_menu', 1);

  /* Disable Admin Bar
  /------------------------------*/
  add_filter('show_admin_bar', '__return_false');

  /* Set image processing quality to 100%
  /-------------------------------------*/
  add_filter('jpeg_quality', function($arg){return 100;});
  add_filter( 'wp_editor_set_quality', function($arg){return 100;} );

  /* Remove html-hardcoded thumbnail-dimensions (for CSS-Scaling of Images)
  /------------------------------------------------------------------------*/
  function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
    $html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
    return $html;
  } add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );
?>
