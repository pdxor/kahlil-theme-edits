<?php
namespace App;
/**
 * Add Formidable Options Page in Media
 * @var [type]
 */
if( function_exists('acf_add_options_page') ) {
	// add sub page
	acf_add_options_sub_page(array(
		'page_title' 	=> 'PDF Modal Speedbump Form',
		'menu_title' 	=> 'Download Form',
		'parent_slug' 	=> 'upload.php',
	));
}
/**
 * Populate an ACF field with all Formidable forms
 * @return [type] [description]
 */
function get_forms(){
    $results = array();
    $results['--'] = '--';
    foreach (\RGFormsModel::get_forms( null, 'title' ) as $form) {
        $results[$form->id] = $form->title;
    }
    return $results;
}
/* auto populate acf field with form IDs */
add_filter('acf/load_field/name=choose_pdf_modal_form', function( $field ) {
  $result = get_forms();
	if( is_array($result) ){
		$field['choices'] = array();
		foreach( $result as $key=>$match ){
			$field['choices'][ $key ] = $match;
		}
	}
    return $field;
});

/**
 * Remove the submit button from this form, we'll submit it via the download button`
 */
add_action('acf/init', function() {
  $form  = get_field("choose_pdf_modal_form", "option");
  add_filter( 'gform_submit_button_' . $form, '__return_false' );
  add_filter( 'gform_confirmation_anchor_' . $form, '__return_false' );
  }
);

/**
 * Put our Formidable form into the modal.
 * @var [type]
 */
if( function_exists('gravity_form') ) {

  add_action('pdf_modal_form', function() {
    if(get_field("choose_pdf_modal_form", 'option')) {
      gravity_form( get_field("choose_pdf_modal_form", 'option'), $display_title = false, $display_description = true, $display_inactive = false, $field_values = null, $ajax = true, 0, $echo = true );
    }
  });
}
