<?php
namespace App;
use Sober\Controller\Controller;
class TaxonomyBusinessUnit extends Controller {
  public static function allcountries() {
    $values = get_posts(
        array(
            'post_type' => 'location',
            'meta_key' => 'country',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'tax_query' => array(
              array(
                'taxonomy' => 'business_unit',
                'field' => 'slug',
                'terms' => array(get_queried_object()->slug)
              )
            )
        )
    );
    // Initialize the meta_values variable
    $meta_values = array();
    // Loop through each post and get the "country" ACF field, add them to the $meta_values array
    foreach( $values as $v ) {
        $meta_values[] = get_post_meta( $v->ID, 'country', true );
    }
    // Strip out duplicate entries
    $return = array_filter(array_unique($meta_values));
    // Return the values as an array
    return $return;
  }
  public static function selectedcountry($country) {
    $return = '';
    if(isset($_GET['country']) && $country == $_GET['country']) {
      $return = 'selected';
    } elseif(!isset($_GET['country']) && $country == 'none') {
      $return = 'selected';
    }
    return $return;
  }
  public static function featuredlocations() {
    $country = (isset($_GET['country'])) ? $_GET['country'] : '';
    $posts = get_posts(
        array(
            'post_type' => 'location',
            'orderby' => 'title',
            'order' => 'ASC',
            'posts_per_page' => -1,
            'meta_query'	=> array(
              'relation'		=> 'AND',
          		array(
          			'key'	 	=> 'country',
          			'value'	  	=> $country,
          			'compare' 	=> '=',
          		),
          		array(
          			'key'	  	=> 'featured',
          			'value'	  	=> '1',
          			'compare' 	=> '=',
          		),
          	),
            'tax_query' => array(
              array(
                'taxonomy' => 'business_unit',
                'field' => 'slug',
                'terms' => array(get_queried_object()->slug)
              )
            )
        )
    );
    // Return posts
    return $posts;
  }
  public static function theid($featured_post = null) {
    $theid = get_the_id();
    if(isset($featured_post)) {
      $theid = $featured_post->ID;
    }
    return $return;
  }
  public static function btnclass($is_featured = null) {
    $return = 'primary';
    if($is_featured) {
      $return = get_queried_object()->slug;
    }
    return $return;
  }

  public static function btnurl($is_featured = null) {
    if(strpos($is_featured, 'http') !== 0) {
      $return = 'http://' . $is_featured;
    } else {
      $return = $is_featured;
    }
    return $return;
  }

}
