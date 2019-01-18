<?php

Namespace App;

if(class_exists('Tribe__Settings_Manager')) {
  // Set the The Events Calendar default template to our Sage-friendly template.
  \Tribe__Settings_Manager::set_option( 'tribeEventsTemplate', 'views/template-events.blade.php' );
}

add_filter( 'nav_menu_css_class', function ($classes = array(), $menu_item = false){

    if((is_singular('tribe_events') || is_post_type_archive('tribe_events')) && $menu_item->url == '/events/') {
        $classes[] ='current-page-ancestor';
    }
    if((is_singular('tribe_events') || is_post_type_archive('tribe_events')) && $menu_item->url == get_post_type_archive_link( 'post' )) {
        if(($key = array_search('current_page_parent', $classes)) !== false) {
            unset($classes[$key]);
        }
    }

    return $classes;
}, 10, 2 );
