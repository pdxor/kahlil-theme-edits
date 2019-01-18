<?php
namespace App;
add_action( 'wp_print_scripts', function() {
  // Google Language Translator Premium
  //  wp_dequeue_script('flags');
  //  wp_dequeue_script('my-load-selectbox-script');
  //  wp_dequeue_script('cookie.js');
}, 200 );
add_action( 'wp_print_styles', function() {
  // Google Language Translator Premium
  wp_dequeue_style('style.css');
  // WP RSS Excerpts and Thumbnails
  wp_dequeue_style('wprss-et-styles');
  // Download Monitor
  wp_dequeue_style('dlm-frontend');
  // WP RSS Aggregator
  wp_dequeue_style('colorbox');
}, 200 );
// WPML
define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
add_action( 'get_footer', function() {
  // Google Language Translator Premium
  wp_enqueue_style('style.css');
  // WP RSS Excerpts and Thumbnails
  wp_enqueue_style('wprss-et-styles');
  // Download Monitor
  wp_enqueue_style('dlm-frontend');
});
add_filter('script_loader_tag', function($tag, $handle) {
  $scripts_to_async = array('vendor');
  foreach($scripts_to_async as $async_script) {
    if ($async_script === $handle) {
      return str_replace(' src', ' async="async" src', $tag);
    }
  }
  return $tag;
}, 10, 2);
