<?php

namespace App;

use Sober\Controller\Controller;

use Sober\Controller\Module\Tree;

class Application extends Controller implements Tree {

    /**
     * Product archive thumbnail size
     * @return array
     */
    public function thumb_size() {
        return 'medium';
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

    public function breadcrumb_container() {
      $return = 'container';

      return $return;
    }

}
