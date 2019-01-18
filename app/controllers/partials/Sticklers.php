<?php

namespace App;

use Sober\Controller\Controller;

if(get_theme_mod( 'subtheme_setting') == 'sticklers') {
  trait Sticklers {

    /**
     * Logo
     * @return Logo URL
     */
    public function logo() {
      return asset_path('images/logos/sticklers.png');
    }


    /**
     * Icon
     * @return Icon URL
     */
    public function icon() {
      return asset_path('images/icons/sticklers.svg');
    }


    /**
     * Where to Buy link
     */
    public function wheretobuy() {

      // Initialize the return variable
      $return  = 'https://tools.microcare.com/business_unit/' . explode('.', $_SERVER['SERVER_NAME'])[0];

      return $return;
    }

  }

} else {
  trait Sticklers { }
}
