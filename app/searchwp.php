<?php
namespace App;

add_filter( 'searchwp_term_pattern_whitelist', function($patterns) {
  return array();
} );

/**
* Hide missing integration notices
*/
add_filter( 'searchwp_missing_integration_notices', '__return_false' );
