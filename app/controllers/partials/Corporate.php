<?php

namespace App;

use Sober\Controller\Controller;

if(get_theme_mod( 'subtheme_setting') == 'corporate') {
  trait Corporate {

    public function iscorporate() {
      return true;
    }

    /**
     * Logo
     * @return Logo URL
     */
    public function logo() {
      return asset_path('images/logos/corporate.png');
    }


    /**
     * Icon
     * @return Icon URL
     */
    public function icon() {
      return asset_path('images/icons/corporate.svg');
    }


    public static function get_platform($url) {

      $return = array();

      switch($url) {

        // Electronics live and staging
        case "https://electronics.microcare.com";
        case "https://staging.microcareelectronics.com";
          $return['slug']  = 'electronics';
          $return['name']  = 'Electronics';
          $return['url'] = $url;
          $return['buy'] = 'https://www.microcare.com/business_unit/electronics/';
          break;

        // Sticklers live and staging
        case "https://sticklers.microcare.com";
        case "https://staging.sticklerscleaners.com";
          $return['slug']  = 'sticklers';
          $return['name']  = 'Sticklers';
          $return['url'] = $url;
          $return['buy'] = 'https://www.microcare.com/business_unit/sticklers/';
          break;

        // Medical live and staging
        case "https://medical.microcare.com";
        case "https://staging.microcaremedical.com";
          $return['slug']  = 'medical';
          $return['name']  = 'Medical';
          $return['url'] = $url;
          $return['buy'] = $url . '/where-to-buy/';
          break;

        // Precision Cleaners live and staging
        case "https://precisioncleaners.microcare.com";
        case "https://staging.microcareprecisioncleaners.com";
          $return['slug']  = 'precisioncleaners';
          $return['name']  = 'Precision Cleaners';
          $return['url'] = $url;
          $return['buy'] = $url . '/where-to-buy/';
          break;
      }
      return $return;
    }

    /**
     * "return to" platform link and cookie
     */
    public function returnto() {

        // Initialize the return variable
        $return  = null;

        // Set the cookie name
        $cookie = "micro_referrer";

        // Get the referrer's URL, or the cookie if its set
        $the_url = '';
        if(isset($_SERVER['HTTP_REFERER'])) {
          $the_url = $_SERVER['HTTP_REFERER'];
        };

        // If there's a a referrer or a cookie
        if(isset($the_url)) {

          // Parse the URL so we can test it
          $parse = parse_url($the_url);

          // If the result is a parsed URL
          if(isset($parse['host'])) {

            // Set the platform name to test in the get_platform() function
            $platform = $parse['scheme'] . '://' . $parse['host'];

          }

          // If the platform is set properly
          if(isset($platform)) {

            // Get the relevent site info array from the get_platform() function
            $site_info = $this::get_platform($platform);
            if(isset($site_info['url']) && $url = $site_info['url']) {

              // Set the cookie
              setcookie($cookie, $url, time()+1800, '/');  /* expire in 0.5 hour */

            }
          }
        }

        // If site info returns, get the 'buy' array element
        if(isset($site_info['url'])) {
          $site_info['url'] = htmlspecialchars($_SERVER['HTTP_REFERER']);
          $return = $site_info;
        }

        // Return the value
        return $return;
      }


      /**
       * Where to Buy link
       */
      public function wheretobuy() {

        // Initialize the return variable
        $return  = 'https://tools.microcare.com/buy/';

        return $return;
      }

      /**
       * Show resources on single content
       */
      public function showresources() {
        return false;
      }

  }
} else {
  trait Corporate { }
}
