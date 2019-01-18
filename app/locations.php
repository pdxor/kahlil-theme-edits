<?php
namespace App;

// action
add_action('pre_get_posts', function($query) {

  $query_filters = array(
  	'field_53f72aaa185b8'	=> 'country',
  );
  	// bail early if is in admin
  	if( is_admin() ) return;

    // Also bail if we're not on a Locations archive page


  	// bail early if not main query
  	// - allows custom code / plugins to continue working
  	if( !$query->is_main_query() ) return;

    if( !is_tax('business_unit') ) return;

  	// get meta query
  	$meta_query = $query->get('meta_query');
    if(!is_array($meta_query)) {
      $meta_query = array();
    }

  	// loop over filters
  	foreach( $query_filters as $key => $name ) {

  		// continue if not found in url
  		if( empty($_GET[ $name ]) ) {

  			$values = 'none';

  		} else {
        $values = $_GET[ $name ];
      }


  		// get the value for this filter
  		// eg: http://www.website.com/events?city=melbourne,sydney
  		$value = explode(',', $values);


  		// append meta query
      	$meta_query[] = array(
          'relation'		=> 'AND',
          array(
              'key'		=> $name,
              'value'		=> $value,
              'compare'	=> 'IN',
          )
        );

  	}

  	// update meta query
  	$query->set('meta_query', $meta_query);
    $query->set('orderby', 'title');
    $query->set('order', 'ASC');
    $query->set('posts_per_page', '50');

}, 10, 1);
