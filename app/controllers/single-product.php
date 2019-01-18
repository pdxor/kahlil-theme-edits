<?php

namespace App;

use Sober\Controller\Controller;

use Sober\Controller\Module\Tree;

class Product extends Controller implements Tree {

    use Tabs;

    use MSDSButton;

    use TechSheetButton;

    use ResourceTypes;

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

}
