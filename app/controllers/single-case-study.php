<?php

namespace App;

use Sober\Controller\Controller;

use Sober\Controller\Module\Tree;

class CaseStudy extends Controller implements Tree {

  public function downloads() {

    // Initialize return
    $return = '';
    
    // Get the attachment ID
    $id = get_field('pdf');
    
    // Get the related downloads field
		$file = wp_get_attachment_url($id);
    
    // Get the attachment title
    $title = get_the_title($id);
    
    // Do each downloads shortocode as part of the return
		if( $file ) {
				$return .= '<a class="btn btn-primary" title="' . $title . '" href="' . $file . '">Download</a>';
		}
    return $return;
  }

}