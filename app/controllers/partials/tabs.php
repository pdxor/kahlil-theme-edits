<?php
namespace App;
use Sober\Controller\Controller;
trait Tabs {
  public function tabs() {
    if(isset(getAndSetRegion::get_country()['country_code'])) {
      $args = array(
        'us_active' => ( getAndSetRegion::get_country()['country_code'] == 'us' ) ? 'active show' : '',
        'metric_active' => ( getAndSetRegion::get_country()['country_code'] != 'us' ) ? 'active show' : '',
        'current_country' => getAndSetRegion::get_country()['country_code'],
      );
      return $args;
    }
  }
}
