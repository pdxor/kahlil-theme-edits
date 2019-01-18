<?php

namespace App;

use Sober\Controller\Controller;

use Sober\Controller\Module\Tree;

class Newsletters extends Controller implements Tree {

  public function downloads() {
    // Initialize return
    $return = '';

    // Get the related downloads field
		if( have_rows('newsletter_pdf') ) {
      $return .= '<ul class="list-group">';
      // Do each downloads shortocode as part of the return
      while ( have_rows('newsletter_pdf') ) : the_row();

        // Get the file URL from ACF
        $file = get_sub_field('file');

        if( $file ) {

          $return .= '<li class="list-group-item newsletter-download-item d-flex">
            <div><img class="mr-3" src="' . asset_path('images/flags/' . get_sub_field('language') . '.png') . '"></div>
            <div class="newsletter-download-title">' . get_sub_field('title') . '</div>
            <div class="mr-0 ml-auto"><a class="btn btn-primary btn-sm" title="' . $file['title'] . '" href="' . $file['url'] . '">' . __('Download') . '</a></div>
          </li>';

        }

      endwhile;
      $return .= '</ul>';
    }

    return $return;
  }

}
