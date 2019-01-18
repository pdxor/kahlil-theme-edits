<?php

namespace App;

use Sober\Controller\Controller;

trait TechSheetButton {


  public static function techsheetbutton() {

    $package = get_sub_field('package_type');

    $countries_values = array();
    $eng_countries = get_global_option('languages');
    if( have_rows_global_option('languages') ):

        // loop through the rows of data
        while ( have_rows_global_option('languages') ) : the_row();
            $key = get_sub_global_option('language_abbreviation');
            $value = get_sub_global_option('language_name');
            // display a sub field value
            $countries_values[$key] = $value;

        endwhile;

    endif;
    $default_country = "us";
    $default_country_name = "United States";
    $current_country = getAndSetRegion::get_country()['country_code'];
  $country_display = $current_country;
  if($current_country == "us") {
    $current_country = "usa";
    $country_display = "us";
  }
    if($default_country == "us") {
    $current_country = "usa";
  }
  $wp_uploads_dir = "app/uploads";

      $return = '';
        $return .='<!--  split button function -->';

        $package_type = ( get_sub_field('package_type') ) ? get_sub_field('package_type') : '';
    		$wp_uploads_dir = "app/uploads";

				$build_filename    = wp_get_attachment_url(get_field('tech_sheets'));
        //$build_filename2     = $wp_uploads_dir . "/files/MSDS/" . strtoupper($current_country) . " - " . $package_type . " - " . get_field('master_sds_product_number') . " - TDS" . get_sub_field('sds') . ".pdf";

        $return .=  '<!-- ' . $build_filename . ' -->';
        //$return .=  '<!-- ' . $build_filename2 . ' -->';


        $filename = $build_filename;
        //if(!$filename) { $filename = self::fileExistsSingle($build_filename2); }

        if( $filename ) :
        $return .= '
            <div class="btn-group dropup text-left">
                <a class="btn btn-secondary btn-sm" title="' . __('Tech Sheet: ')  . get_the_title() . '" href="' . $filename . '"><i class="fa fa-cloud-download"></i> ' . $current_country . '</a>
        ';

/*

    if(($key = array_key_exists($current_country, $countries_values)) !== false) {
            unset($countries_values[$current_country]);
        }
        foreach ($countries_values as $key => $value) {
            $build_menu_filename     = "files/TECHSHEETS/" . $value . "/" . strtoupper($key) . " - " . get_sub_field('package_type') . " - " . get_field('master_sds_product_number') . " - TDS" . get_sub_field('sds') . ".pdf";

            $menufilename = self::fileExistsSingle($build_menu_filename);

            if(!$menufilename) {
                if(array_key_exists($key, $countries_values)) {
                    unset($countries_values[$key]);
                }
            }

        }


        if( count($countries_values) > 0 ) :
        $return .= '
      <button type="button" class="btn btn-secondary dropdown-toggle btn-sm" data-toggle="dropdown">
        <span class="caret"></span>
        <span class="sr-only">Toggle Dropdown</span>
      </button>
      <ul class="dropdown-menu" role="menu">
      ';

        foreach ($countries_values as $key => $value):
            $build_menu_filename     = "files/TECHSHEETS/" . $value . "/" . strtoupper($key) . " - " . get_sub_field('package_type') . " - " . get_field('master_sds_product_number') . " - TDS" . get_sub_field('sds') . ".pdf";

            echo "<!-- " . $build_menu_filename . " -->";

            $menufilename = self::fileExistsSingle($build_menu_filename);

        $return .= '
            <li><a href="' . $menufilename . '">' . $value . '</a></li>
            ';
        endforeach;

        $return .= '</ul>';
    endif;
*/
        $return .= '</div>';
    endif;

        $return .= '<!-- end split button function -->';


    return $return;
  }
}
