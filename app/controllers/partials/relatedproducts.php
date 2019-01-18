<?php

namespace App;

use Sober\Controller\Controller;

trait RelatedProducts {
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
}
