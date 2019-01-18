<?php
namespace App;

/**
 * Set up sidebar to appear on non-page content
 */
add_filter('sage/display_sidebar', function() {

  $return = false;
  if('template-landing.blade.php' != basename(get_page_template())) {
      $return = true;
  }
  if('application' == get_post_type()) {
      $return = false;
  }
  if('location' == get_post_type()) {
      $return = false;
  }
  if(is_tax('business_unit')) {
      $return = false;
  }
  return $return;

});
