<?php

namespace App;

use Sober\Controller\Controller;

class App extends Controller {

  /**
   * Platform specific traits
   *
   * All platform traits are included here to make this theme easier to maintain.
   * Comment out the traits not needed by this site.
   */

   // Trait for all sites
   use All;

   // The corporate homepage
   use Corporate;
   use Platform;

   // Individual platforms
   use Electronics;
   use Sticklers;
   use Medical;
   use PrecisionCleaners;

}
