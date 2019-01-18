<?php

namespace App;

use Sober\Controller\Controller;

class Single extends Controller {

  use ResourceTypes;

  use FileExists;

  /**
  * Single thumbnail size
  * @return array
  */
  public function thumb_size() {
    return 'large';
  }

  public function downloads() {
    
    // Initialize return
    $return = '';

    // Get the related downloads field
    $file = get_field('download');

    // Do each downloads shortocode as part of the return
    if( $file ) {
        $return .= '<a class="btn btn-primary" href="' . $file['url'] . '">Download</a>';
    }

    return $return;
  }

}

