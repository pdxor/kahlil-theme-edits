<?php

// Add post type as body class
add_filter('body_class', function($classes){
  $classes[] = get_post_type();
  return $classes;
});


// Add body class if [resources] shortcode is used
add_filter('body_class', function($classes){
  global $post;
  if( is_a( $post, 'WP_Post' ) && has_shortcode( $post->post_content, 'resources') ) {
		$classes[] = 'shortcode-resources';
	}
  return $classes;
});


// Add this theme's name to the body classes for easier styling when them is reused
add_filter('body_class', function($classes){
  ;
  $classes[] = 'microcare-' . get_theme_mod( 'subtheme_setting' );
  return $classes;
});
