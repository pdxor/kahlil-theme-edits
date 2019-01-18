<?php
namespace App;
use Sober\Controller\Controller;
trait MSDSButton {
  public static function msdsbutton() {
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
  $build_filename     = $wp_uploads_dir . "/files/MSDS/" . strtoupper($current_country) . " - " . $package_type . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
  //$build_filename2    = $wp_uploads_dir . "/files/MSDS/" . $countries_values[ $current_country ] . "/" . strtoupper($current_country) . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
  //$build_filename3    = $wp_uploads_dir . "/files/MSDS/" . $countries_values[ $current_country ] . "/" . strtoupper($current_country) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . get_sub_field('sds') . ".pdf";
  //$build_filename4    = $wp_uploads_dir . "/files/MSDS/" . $countries_values[ $current_country ] . "/" . strtoupper($current_country) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . "SDS" . get_sub_field('sds') . ".pdf";
  $build_default_filename     = $wp_uploads_dir . "/files/MSDS/" . strtoupper($default_country) . " - " . $package_type . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
  //$build_default_filename2    = $wp_uploads_dir . "/files/MSDS/" . $default_country_name . "/" . strtoupper($default_country) . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
  //$build_default_filename3    = $wp_uploads_dir . "/files/MSDS/" . $default_country_name . "/" . strtoupper($default_country) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . get_sub_field('sds') . ".pdf";
  //$build_default_filename4    = $wp_uploads_dir . "/files/MSDS/" . $default_country_name . "/" . strtoupper($default_country) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . "SDS" . get_sub_field('sds') . ".pdf";
  //$build_default_filename5    = $wp_uploads_dir . "/files/MSDS/" . $default_country_name . "/" . strtoupper($default_country) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . "SDS" . get_sub_field('sds') . ".pdf";
  $return .= '<!-- File: ' . $build_filename . ' -->';
  //$return .= '<!-- ' . $build_filename2 . ' -->';
  //$return .= '<!-- ' . $build_filename3 . ' -->';
  //$return .= '<!-- ' . $build_filename4 . ' -->';
  $return .= '<!-- Default: ' . $build_default_filename . ' -->';
  //$return .= '<!-- ' . $build_default_filename2 . ' -->';
  //$return .= '<!-- ' . $build_default_filename3 . ' -->';
  //$return .= '<!-- ' . $build_default_filename4 . ' -->';
  $filename = self::fileExistsSingle($build_filename);
  //if(!$filename) { $filename = fileExistsSingle($build_filename2); }
  //if(!$filename) { $filename = fileExistsSingle($build_filename3); }
  //if(!$filename) { $filename = fileExistsSingle($build_filename4); }
  if(!$filename) {
    $current_country = $default_country;
    $filename = self::fileExistsSingle($build_default_filename);
    //if(!$filename) { $filename = fileExistsSingle($build_default_filename2); }
    //if(!$filename) { $filename = fileExistsSingle($build_default_filename3); }
    //if(!$filename) { $filename = fileExistsSingle($build_default_filename4); }
  }
  if( $filename ) :
    $return .= '
    <div class="btn-group text-left">
    <a title="' . __('SDS') . ' - ' . get_field('master_sds_product_number') . ' - ' . $package_type . ' - ' . strtoupper($current_country) . '" class="btn btn-primary btn-sm sds-download" href="/' . $filename . '"><i class="fa fa-cloud-download"></i> ' . strtolower($country_display) . '</a>
    ';
    foreach ($countries_values as $key => $value) {
      if($key == "us") {
        $key = "usa";
      }
      $build_menu_filename     = $wp_uploads_dir . "/files/MSDS/" . strtoupper($key) . " - " . $package_type . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
      //$build_menu_filename2    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
      //$build_menu_filename3    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . get_sub_field('sds') . ".pdf";
      //$build_menu_filename4    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . "SDS" . get_sub_field('sds') . ".pdf";
      //$menufilename = self::fileExistsSingle($build_menu_filename);
      $menufilename = $build_menu_filename;
      //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename2); }
      //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename3); }
      //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename4); }
      if(!$menufilename) {
        if(array_key_exists($key, $countries_values)) {
          unset($countries_values[$key]);
        }
      }
    }
    if( count($countries_values) > 1 ) :
      $return .= '
      <button type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown">
      <span class="caret"></span>
      <span class="sr-only">Toggle Dropdown</span>
      </button>
      <div class="dropdown-menu" role="menu">
      ';
      foreach ($countries_values as $key => $value):
        if($key == "us") {
          $key = "usa";
        }
        $build_menu_filename     = $wp_uploads_dir . "/files/MSDS/" . strtoupper($key) . " - " . $package_type . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
        //$build_menu_filename2    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - " . get_field('master_sds_product_number') . " - SDS" . get_sub_field('sds') . ".pdf";
        //$build_menu_filename3    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . get_sub_field('sds') . ".pdf";
        //$build_menu_filename4    = $wp_uploads_dir . "/files/MSDS/" . $value . "/" . strtoupper($key) . " - "  . get_field('master_sds_product_number') . " - " . $package_type . " - " . "SDS" . get_sub_field('sds') . ".pdf";
        $return .= "<!-- Menu File: " . $build_menu_filename . " -->";
        //echo "<!-- " . $build_menu_filename2 . " -->";
        //echo "<!-- " . $build_menu_filename3 . " -->";
        //echo "<!-- " . $build_menu_filename4 . " -->";
        $menufilename = self::fileExistsSingle($build_menu_filename);
        $return .= "<!-- Exists File: " . $menufilename . " -->";
        //$menufilename = $build_menu_filename;
        //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename2); }
        //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename3); }
        //if(!$menufilename) { $menufilename = fileExistsSingle($build_menu_filename4); }
        if($menufilename) {
          $return .= '
          <a class="dropdown-item" title="' . __('Download SDS') . ' - ' . get_field('master_sds_product_number') . ' - ' . $package_type . ' - ' . $value . '" class="sds-download" href="/' . $menufilename . '">' . $value . '</a>
          ';
        }
        endforeach;
      $return .= '</div>';
    endif;
    $return .= '</div>';
  endif;
  $return .= '<!-- end split button function -->';
  return $return;
  }
}
