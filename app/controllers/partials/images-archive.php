<?php

namespace App;

use Sober\Controller\Controller;

trait ImagesArchive {


  /**
  * Product archive thumbnail size
  * @return array
  */
  public function thumb_size() {
    return 'category-thumb';
  }


  /**
  * Product archive thumbnail classes
  * @return array
  */
  public function thumb_classes() {
    $args = array(
      'class' => 'img-fluid mx-auto d-block'
    );

    return $args;
  }
  

}
