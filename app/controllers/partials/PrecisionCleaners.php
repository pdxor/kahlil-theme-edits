<?php

namespace App;

use Sober\Controller\Controller;

if(get_theme_mod( 'subtheme_setting') == 'precisioncleaners') {
  trait PrecisionCleaners {

    /**
     * Logo
     * @return Logo URL
     */
    public function logo() {
      return asset_path('images/logos/precisioncleaners.png');
    }


    /**
     * Icon
     * @return Icon URL
     */
    public function icon() {
      return asset_path('images/icons/precisioncleaners.svg');
    }


    /**
     * Where to Buy link
     */
    public function wheretobuy() {

      // Initialize the return variable
      $return  = 'https://precisioncleaners.microcare.com/where-to-buy/';

      return $return;
    }

  }

} else {
  trait PrecisionCleaners { }
}
