<?php

namespace App;

use Sober\Controller\Controller;

class Archive extends Controller {

    use Tabs;

    use MSDSButton;

    use TechSheetButton;

    use ResourceTypes;

    use ImagesArchive;

    use FileExists;

  /**
   * Customized Pagination
   */
   public function pagination() {

     // Set up the pagination the way we want it
     $return = get_the_posts_pagination( array(
         'mid_size' => 2,
         'prev_text' => __( 'Previous Page', 'textdomain' ),
         'next_text' => __( 'Next Page', 'textdomain' ),
     ) );

     return $return;
   }

   /**
    * Product formulation taxonomy terms
    */
   public static function formulations($id) {
     $terms = wp_get_post_terms( $id, 'market');

     return $terms;
   }


}
