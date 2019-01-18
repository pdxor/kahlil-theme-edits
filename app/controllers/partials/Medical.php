<?php

namespace App;

use Sober\Controller\Controller;

if(get_theme_mod( 'subtheme_setting') == 'medical') {
  trait Medical {

    /**
     * Logo
     * @return Logo URL
     */
    public function logo() {
      return asset_path('images/logos/medical.png');
    }


    /**
     * Icon
     * @return Icon URL
     */
    public function icon() {
      return asset_path('images/icons/medical.svg');
    }


    /**
     * Where to Buy link
     */
    public function wheretobuy() {

      // Initialize the return variable
      $return  = 'https://medical.microcare.com/where-to-buy/';

      return $return;
    }

  }

} else {
  trait Medical { }
}
