<?php

namespace App;

use Sober\Controller\Controller;

trait ResourceTypes {

  /**
   * Get related products.
   *   If this post is a product, query the related products ACF field
   *   If this post is NOT a product, do a reverse query for products with this post as a related field
   * @return [type] [description]
   */
  public function get_related_products() {
    if('product' != get_post_type()) {

      // Get an array of the resource types

      // Query the relationship field on all 'products' associated with the current post type
      $return = get_posts(array(
        'post_type' => 'product',
        'suppress_filters' => 0,
        'meta_query' => array(
          array(
            'key' => get_post_type(), // name of custom field
            'value' => '"' . get_the_ID() . '"', // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
          )
        )
      ));
    } else {
      $return = get_field('related_products');
    }
    return $return;
  }

  public function the_resources() {

    // Initalize return array
    $return = array();

    $resources = \App\get_resources();

    // Check if each resource block's acf-field is populated. Set the return array if so.
    foreach($resources as $item) {
      if($item['acf_field'] && !get_field($item['acf_field']))
        continue;
      if($item['id'] == 'product' && !self::get_related_products())
        continue;
      $return[] = $item;
    }

    // Return only the resources this post has related to it.
    return $return;
  }


  public function tags() {

    // Initialize return variable
    $return = '';

    // Get the tags for this post
    $tags = wp_get_post_tags(get_the_id());

    // Count the tags returned
    $count = 10;

    // Set a counter
    $i=0;

    // Get the total number of tags returned
    $total = count($tags);

    // Loop through the tags and add them to $return
    foreach($tags as $tag) {
        if($i <= $count) {
          $return .= $tag->name;
          if($i < $count && $i < ($total - 1)) {
            $return .= ", ";
          }
        }
        $i++;
    }
    return $return;
  }

}
