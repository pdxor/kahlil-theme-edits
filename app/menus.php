<?php

namespace App;

/**
 * Show submenu based on current parent
 *
 * you can display it in your theme using wp_nav_menu (just like you normally would), but also passing in a sub_menu flag to activate the custom sub_menu function:
 *
 * wp_nav_menu( array(
 * 	'theme_location' => 'primary',
 * 	'sub_menu'       => true
 * ) );
 */
// add hook
add_filter( 'wp_nav_menu_objects', function($sorted_menu_items, $args) {
  // filter_hook function to react on sub_menu flag
  if ( isset( $args->sub_menu ) ) {
    $root_id = 0;
    // find the current menu item
    foreach ( $sorted_menu_items as $menu_item ) {
      if ( $menu_item->current ) {
        // set the root id based on whether the current menu item has a parent or not
        $root_id = ( $menu_item->menu_item_parent ) ? $menu_item->menu_item_parent : $menu_item->ID;
        break;
      }
    }
    // find the top level parent
    if ( ! isset( $args->direct_parent ) ) {
      $prev_root_id = $root_id;
      while ( $prev_root_id != 0 ) {
        foreach ( $sorted_menu_items as $menu_item ) {
          if ( $menu_item->ID == $prev_root_id ) {
            $prev_root_id = $menu_item->menu_item_parent;
            // don't set the root_id to 0 if we've reached the top of the menu
            if ( $prev_root_id != 0 ) $root_id = $menu_item->menu_item_parent;
            break;
          }
        }
      }
    }
    $menu_item_parents = array();
    foreach ( $sorted_menu_items as $key => $item ) {
      // init menu_item_parents
      if ( $item->ID == $root_id ) $menu_item_parents[] = $item->ID;
      if ( in_array( $item->menu_item_parent, $menu_item_parents ) ) {
        // part of sub-tree: keep!
        $menu_item_parents[] = $item->ID;
      } else if ( ! ( isset( $args->show_parent ) && in_array( $item->ID, $menu_item_parents ) ) ) {
        // not part of sub-tree: away with it!
        unset( $sorted_menu_items[$key] );
      }
    }
    if(count($sorted_menu_items) > 1) {
      return $sorted_menu_items;
    } else {
      return array();
    }
  } else {
    return $sorted_menu_items;
  }
}, 10, 2 );


/**
 * Add start_in argument to nav menu to get a specific submenu by parent page ID
 * From http://stackoverflow.com/questions/5770884/how-to-display-part-of-a-menu-tree
 */
add_filter("wp_nav_menu_objects",function($sorted_menu_items, $args) {
  // filter_hook function to react on start_in argument
  if(isset($args->start_in)) {
      $menu_item_parents = array();
      foreach( $sorted_menu_items as $key => $item ) {
          // init menu_item_parents
          if( $item->object_id == (int)$args->start_in ) $menu_item_parents[] = $item->ID;
          if( in_array($item->menu_item_parent, $menu_item_parents) ) {
              // part of sub-tree: keep!
              $menu_item_parents[] = $item->ID;
          } else {
              // not part of sub-tree: away with it!
              unset($sorted_menu_items[$key]);
          }
      }
      return $sorted_menu_items;
  } else {
      return $sorted_menu_items;
  }
},10,2);


/**
 * Class Name: wp_bootstrap4_navwalker
 * GitHub URI: https://github.com/twittem/wp-bootstrap-navwalker
 * Description: A custom WordPress nav walker class to implement the Bootstrap 3 navigation style in a custom theme using the WordPress built in menu manager.
 * Version: 2.0.4
 * Author: Edward McIntyre - @twittem
 * License: GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */
class wss_bootstrap4_navwalker extends \Walker_Nav_Menu {
  /**
 * @see Walker::start_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param int $depth Depth of page. Used for padding.
 */
public function start_lvl( &$output, $depth = 0, $args = array() ) {
  $indent = str_repeat( "\t", $depth );
  $output .= "\n$indent<ul role=\"menu\" class=\" sub-menu\">\n";
}
/**
 * Ends the list of after the elements are added.
 *
 * @see Walker::end_lvl()
 *
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param int    $depth  Depth of menu item. Used for padding.
 * @param array  $args   An array of arguments. @see wp_nav_menu()
 */
public function end_lvl( &$output, $depth = 0, $args = array() ) {
  $indent = str_repeat("\t", $depth);
  $output .= "$indent</ul>\n";
}
/**
 * Start the element output.
 *
 * @see Walker::start_el()
 *
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item   Menu item data object.
 * @param int    $depth  Depth of menu item. Used for padding.
 * @param array  $args   An array of arguments. @see wp_nav_menu()
 * @param int    $id     Current item ID.
 */
public function end_el( &$output, $item, $depth = 0, $args = array() ) {
  if($depth === 1){
    if(strcasecmp( $item->attr_title, 'divider' ) == 0 || strcasecmp( $item->title, 'divider') == 0) {
      $output .= '</div>';
    }else if ($depth === 1 && (strcasecmp( $item->attr_title, 'header') == 0 && $depth === 1)) {
      $output .= '</h6>';
    }
  }else{
    $output .= '</li>';
  }
}
/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @param int $current_page Menu item ID.
 * @param object $args
 */
public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
  $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
  /**
   * Dividers, Headers or Disabled
   * =============================
   * Determine whether the item is a Divider, Header, Disabled or regular
   * menu item. To prevent errors we use the strcasecmp() function to so a
   * comparison that is not case sensitive. The strcasecmp() function returns
   * a 0 if the strings are equal.
   */
  //( strcasecmp($item->attr_title, 'disabled' ) == 0 )
  if($depth === 1 && (strcasecmp( $item->attr_title, 'divider' ) == 0 || strcasecmp( $item->title, 'divider') == 0)) {
    $output .= $indent . '<div class="dropdown-divider">';
  }else if ((strcasecmp( $item->attr_title, 'header') == 0 && $depth === 1) && $depth === 1){
    $output .= $indent . '<h6 class="dropdown-header">' . esc_attr( $item->title );
  }else{
    $class_names = $value = '';
    $classes = empty( $item->classes ) ? array() : (array) $item->classes;
    $atts = array();
    $atts['title']  = ! empty( $item->title )	? $item->title	: '';
    $atts['target'] = ! empty( $item->target )	? $item->target	: '';
    $atts['rel']    = ! empty( $item->xfn )		? $item->xfn	: '';
    $atts['href'] = ! empty( $item->url ) ? $item->url : '';
    $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
    if ( in_array( 'current-menu-item', $classes ) )
      $classes[] = ' active';
      $classes[] = 'nav-item';
      $classes[] = 'nav-item-' . $item->ID;
      $atts['class']			= 'nav-link';
      if ( $args->has_children ){
        $classes[] = ' dropdown';
      }
      $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
      $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';
      $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
    $output .= $indent . '<li ' . $id . $value . $class_names .'>';
    $atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args );
    $attributes = '';
    foreach ( $atts as $attr => $value ) {
      if ( ! empty( $value ) ) {
        $value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
        $attributes .= ' ' . $attr . '="' . $value . '"';
      }
    }
    $item_output = $args->before;
    $item_output .= '<a'. $attributes .'>';
    /*
     * Icons
     * ===========
     * Since the the menu item is NOT a Divider or Header we check the see
     * if there is a value in the attr_title property. If the attr_title
     * property is NOT null we apply it as the class name for the icon
     */
    if ( ! empty( $item->attr_title ) ){
      $item_output .= '<span class="' . esc_attr( $item->attr_title ) . '"></span>&nbsp;';
    }
    $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;
    $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
  }
}
/**
 * Traverse elements to create list from elements.
 *
 * Display one element if the element doesn't have any children otherwise,
 * display the element and its children. Will only traverse up to the max
 * depth and no ignore elements under that depth.
 *
 * This method shouldn't be called directly, use the walk() method instead.
 *
 * @see Walker::start_el()
 * @since 2.5.0
 *
 * @param object $element Data object
 * @param array $children_elements List of elements to continue traversing.
 * @param int $max_depth Max depth to traverse.
 * @param int $depth Depth of current element.
 * @param array $args
 * @param string $output Passed by reference. Used to append additional content.
 * @return null Null on failure with no changes to parameters.
 */
public function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
  if ( ! $element )
    return;
  $id_field = $this->db_fields['id'];
  // Display this element.
  if ( is_object( $args[0] ) )
    $args[0]->has_children = ! empty( $children_elements[ $element->$id_field ] );
  parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
}
/**
 * Menu Fallback
 * =============
 * If this function is assigned to the wp_nav_menu's fallback_cb variable
 * and a manu has not been assigned to the theme location in the WordPress
 * menu manager the function with display nothing to a non-logged in user,
 * and will add a link to the WordPress menu manager if logged in as an admin.
 *
 * @param array $args passed from the wp_nav_menu function.
 *
 */
public static function fallback( $args ) {
  if ( current_user_can( 'manage_options' ) ) {
    extract( $args );
    $fb_output = null;
    if ( $container ) {
      $fb_output = '<' . $container;
      if ( $container_id )
        $fb_output .= ' id="' . $container_id . '"';
      if ( $container_class )
        $fb_output .= ' class="' . $container_class . '"';
      $fb_output .= '>';
    }
    $fb_output .= '<ul';
    if ( $menu_id )
      $fb_output .= ' id="' . $menu_id . '"';
    if ( $menu_class )
      $fb_output .= ' class="' . $menu_class . '"';
    $fb_output .= '>';
    $fb_output .= '<li><a href="' . admin_url( 'nav-menus.php' ) . '">Add a menu</a></li>';
    $fb_output .= '</ul>';
    if ( $container )
      $fb_output .= '</' . $container . '>';
    echo $fb_output;
  }
}
}