<?php

namespace App;

use Sober\Controller\Controller;

class Page extends Controller {

  use ResourceTypes;

  public function breadcrumb_container() {
    $return = '';
    if(get_page_template_slug() == 'views/template-landing.blade.php') {
      $return = 'container';
    }

    return $return;
  }

}
