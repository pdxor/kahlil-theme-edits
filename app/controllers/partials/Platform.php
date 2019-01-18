<?php

namespace App;

use Sober\Controller\Controller;

if(get_theme_mod( 'subtheme_setting') != 'corporate') {
  trait Platform {

      public function isplatform() {
        return true;
      }

    /**
     * Show resources on single content
     */
    public function showresources() {
      return true;
    }

  }
} else {
  trait Platform { }
}
