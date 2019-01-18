<?php
namespace App;

class getAndSetRegion {

    function __construct() {
        if(!is_admin()) {
            if( !isset($_COOKIE['country_code']) || isset($_GET['set_country_code']) ) { add_action('init', array( $this, 'set_country' )); }
        }
    }

    function set_country() {
        if(isset($_COOKIE['country_code'])) {
            $country    = $_COOKIE['country_code'];
            $continent  = $_COOKIE['continent_code'];
        }

        if(isset($_GET['set_country_code'])) {
            $country        = $_GET['set_country_code'];
        }
        if(!isset($country) && function_exists('geoip_detect_get_info_from_current_ip')) {
            $country_obj = geoip_detect_get_info_from_current_ip();
            if($country_obj->country_code) {
                $country = $country_obj->country_code;
            }
            if($country_obj->continent_code) {
                $continent = $country_obj->continent_code;
            }
        }
        if(!isset($country)) {
            $country = 'unknown';
            $continent = 'unknown';
        }
    }

    public static function get_country() {
        if(isset($_COOKIE['country_code'])) {
            $country_code   = $_COOKIE['country_code'];
        } elseif(function_exists('geoip_detect_get_info_from_current_ip')) {
            $country_obj = geoip_detect_get_info_from_current_ip();
            if($country_obj->country_code) {
                $country_code   = $country_obj->country_code;
                $country_code   = strtolower($country_code);
                $continent_code = $country_obj->continent_code;
                $continent_code   = strtolower($continent_code);
            }
        }
        if( !isset($country_code) || $country_code == 'unknown' ){
                $country_code   = 'Unknown';
                $country_name   = 'Unknown';
                $continent_code = 'Unknown';

            }
        $return = array(
            'country_code' => $country_code,
            'continent_code' => $continent_code

        );
        return $return;
    }
}
new getAndSetRegion();

/*--------------------------------------------------------------------------------------
    *
    * Custom menu walker to carry the country_code across multisites using a GET variable
    *
    *-------------------------------------------------------------------------------------*/

class set_country_walker extends \Walker_Nav_Menu
{
      function start_el(&$output, $item, $depth = 0, $args = Array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $country_code = getAndSetRegion::get_country()['country_code'];

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url . '?set_country_code=' . $country_code ) .'"' : '';

            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $args->link_after;
            $item_output .= '</a>';

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }
}
