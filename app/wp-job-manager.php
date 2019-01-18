<?php
namespace App;

/**
 * Edit YOAST SEO breadcrumbs if present to include parent pages for post types
 */
add_filter( 'wpseo_breadcrumb_links', function($links){
  if ( is_singular('job_listing') ) {
    array_splice( $links, 1, -2, array(
        array(
            'id'    => get_option( 'job_manager_jobs_page_id', false )
        )
    ));
  }
  return $links;
});


/**
* Make "Company Name" not required when submitting a job
*/
// Add your own function to filter the fields
add_filter( 'submit_job_form_fields', function($fields) {
    
    // Here we target one of the job fields (job_title) and change it's label
    $fields['company']['company_name']['required'] = false;

    // And return the modified fields
    return $fields;
    
});
