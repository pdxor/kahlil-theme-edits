<?php
/**
 * Advanced Custom Fields Options function
 * Always fetch an Options field value from the default language
 */
function cl_acf_set_language() {
  return acf_get_setting('default_language');
}
function get_global_option($name) {
	add_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	$option = get_field($name, 'option');
	remove_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	return $option;
}
function get_sub_global_option($name) {
	add_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	$option = get_sub_field($name, 'option');
	remove_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	return $option;
}
function have_rows_global_option($name) {
	add_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	$option = have_rows($name, 'option');
	remove_filter('acf/settings/current_language', 'cl_acf_set_language', 100);
	return $option;
}


/**
 * Advanced Custom Fields drop-in functionality for Sage 9
 * Version: 1.0
 * Author: Michael W. Delaney
 */
/**
 * Set local json save path
 * @param  string $path unmodified local path for acf-json
 * @return string       our modified local path for acf-json
 */
add_filter('acf/settings/save_json', function($path) {
  // Set Sage9 friendly path at /theme-directory/resources/assets/acf-json
  $path = get_stylesheet_directory() . '/assets/acf-json';
  // If the directory doesn't exist, create it.
  if (!is_dir($path)) {
    mkdir($path);
  }
  // Always return
  return $path;
});
/**
 * Set local json load path
 * @param  string $path unmodified local path for acf-json
 * @return string       our modified local path for acf-json
 */
add_filter('acf/settings/load_json', function($paths) {
  // append path
  $paths[] = get_stylesheet_directory() . '/assets/acf-json';
  // return
  return $paths;
});
