<?php

namespace App;

trait All {
    /**
     * Main container class
     * @return string whether this is a fluid or fixed container
     */
    public function container() {
      $return  = 'container';
      if(
        'template-landing.blade.php' == basename(get_page_template())
        || 'application' == get_post_type()
      ) {
        $return = 'container-fluid';
      }
      return $return;
    }


    // Set the default breadcrumb container class
    public function breadcrumb_container() {
      return '';
    }

    /**
    * Post archive thumbnail size
    * @return array
    */
    public function thumb_size() {
      return 'medium';
    }


    /**
    * Product archive thumbnail classes
    * @return array
    */
    public function thumb_classes() {
      $args = array(
        'class' => 'img-fluid mx-auto d-block'
      );

      return $args;
    }


/**
		 * Primary Nav Menu arguments
		 * @return array
		 */
    public function primarymenu() {
				$args = array(
					'theme_location'    => 'primary_navigation',
					'container'         => 'ul',
					'container_class'   => '',
					'depth'							=> 1,
					'container_id'      => 'menu-primary-container',
					'menu_class'        => 'navbar-nav nav-primary',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new wss_bootstrap4_navwalker()
				);
        return $args;
    }

    /**
     * Primary Sub Nav Menu arguments
     * @return array
     */
    public function submenu() {
      $args = array(
        'theme_location'    => 'primary_navigation',
        'echo'							=> false,
        'container'         => 'ul',
        'container_class'   => '',
        'sub_menu'					=> true,
        'depth'             => -1,
        'menu_id'           => 'menu-primary-submenu-container',
        'menu_class'        => 'nav nav-pills justify-content-center',
        'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
        'walker'            => new \wp_bootstrap4_navwalker()
      );
      return $args;
    }


    /**
		 * Google Translate Menu arguments
		 * @return array
		 */
    public function googletranslatemenu() {
				$args = array(
          'theme_location' => 'google_languages',
          'container' => false,
          'echo' => false,
          'items_wrap' => '%3$s'
        );
        return $args;
    }


		/**
		 * Footer Nav Menu arguments
		 * @return array
		 */
    public function footermenu() {
				$args = array(
					'theme_location'    => 'footer_navigation',
					'container'         => 'ul',
					'container_class'   => '',
					'depth'							=> 1,
					'container_id'      => 'menu-footer-container',
					'menu_class'        => 'nav justify-content-center flex-column flex-lg-row',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				);
        return $args;
    }


    /**
		 * Corporate Nav Menu arguments
		 * @return array
		 */
    public function corporatemenu() {
				$args = array(
					'theme_location'    => 'corporate_navigation',
					'container'         => 'ul',
					'container_class'   => '',
					'depth'							=> 1,
					'container_id'      => 'menu-corporate-container',
          'menu_id'           => 'menu-corporate',
					'menu_class'        => 'nav nav-corporate',
          'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new \wp_bootstrap4_navwalker()
				);
        return $args;
    }


    /**
		 * Network Nav Menu arguments
		 * @return array
		 */
    public function networkmenu() {
				$args = array(
					'theme_location'    => 'network_navigation',
					'container'         => 'ul',
					'container_class'   => '',
					'depth'							=> 1,
					'container_id'      => 'menu-primary-container',
					'menu_class'        => 'nav',
					'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
					'walker'            => new \wp_bootstrap4_navwalker()
				);
        return $args;
    }


    /**
     * Breadcrumbs
     */
    public function breadcrumbs() {

      // Initialize the return variable
      $return = '';

      // As long as this isn't the front page, return the breadcrumbs
      if ( function_exists('yoast_breadcrumb') && !is_front_page()) {

        // Get the yoast breadcrumbs as simply as possible
        $return = yoast_breadcrumb( '<ol class="breadcrumb"><li>', '</li></ol>', false );

        // Replace the separator so we can use Bootstrap's separator styling
        $return = str_replace( '»', '</li><li>', $return );

      }

      // Get the resource post types
      $resources = \App\get_resources();
      // Initialize whether we're showing a magic 'back' breadcrumb
      $show_magic_back = false;

      if(
        null != url_to_postid(wp_get_referer())
        && get_post_type()
        && 'product' != get_post_type()
        && array_key_exists(get_post_type(), $resources)
      ) {
        $show_magic_back = true;
      }
      // Unless this is a resources referred from another product or resources:
      if( $show_magic_back ) {

        // Set a variable for the referrer for easy asccess
        $id = url_to_postid(wp_get_referer());

        // Return custom breadcrumbs linking back to the referrer
        $return = '<ol class="breadcrumb"><li><a href="' .  get_permalink( $id ) . '"><i class="fa fa-angle-left"></i> ' . get_the_title( $id ) . '</a></li></ol>';

      }
      return $return;
    }


		/**
		 * Site Name
		 * @return Logo URL
		 */
		public function sitename() {
			return get_bloginfo('name');
		}


    /**
     * WPML Languages Menu
     */
     function languages_list_menu(){
       $return  = '';
       if(function_exists('icl_get_languages')) {
       $languages = icl_get_languages('skip_missing=0&orderby=custom');
       if(!empty($languages)){
        foreach($languages as $l){
          $return .= '<a class="flag-icon flag-' . icl_disp_language($l['code']) . ' dropdown-item" href="'.$l['url'].'">';
          $return .= icl_disp_language($l['translated_name']);
          $return .= '</a>';
          }
        }
        return $return;
      }
    }


    /**
     * Child page navigation
     */
     public function childnavigation() {
       global $post;
       $return = '';
       $current_page_id = get_the_ID();
       if(!is_404()) {
         if ( is_page() && $post->post_parent) {
           $return = get_pages('child_of='.$post->post_parent.'&sort_column=menu_order&sort_order=DESC');
         } else {
           $return = get_pages('child_of='.$current_page_id.'&sort_column=menu_order&sort_order=DESC&parent='.$current_page_id);
         }
       }
       return $return;
     }


     public static function childnavsingle($p) {
       global $post;
       $return = array();
       if($post->ID == $p->ID) {
         $i = $post;
       } else {
         $i = $p;
       }
       $return['active'] = ($i->ID == get_the_ID()) ? 'active' : null;
       $return['title'] = get_the_title($i->ID);
       $return['link'] = get_the_permalink($i->ID);

       return $return;
     }


     public function postorparent() {
       global $post;
       $return = '';
       if(isset($post)) {
         if(!$post->post_parent) {
           $return = get_post($post->ID);
         } else {
           $return = get_post($post->post_parent);
         }
       }

       return $return;
     }

     /**
      *  404 Page Image. Random image from two options
      */
      public function fourohfourimage() {

        // Get a random number between 1 and 2 inclusive
        $rand = rand(1, 2);

        // Get the current "sub theme"
        $platform = get_theme_mod( 'subtheme_setting');

        // Build the filename
        $filename = $platform . $rand . ".jpg";

        return asset_path('images/404/' . $filename);
      }

      /**
       * Site-wide alerts
       */
      public function alert() {
        $return = false;
        if(get_field('enable_alert', 'option')) {
          $return = get_field('alert', 'option');
        }

        // Always return
        return $return;
      }

}
