<?php

namespace App;

function get_resources() {
  $resources = array(
    'case-study' => array(
      'id' => 'case-study',
      'name' => __('Case Studies', 'microcare_theme'),
      'acf_field' => 'case_studies'
    ),
    'faq' => array(
      'id' => 'faq',
      'name' => __('FAQs', 'microcare_theme'),
      'acf_field' => 'faqs'
    ),
    'video' => array(
      'id' => 'video',
      'name' => __('Videos', 'microcare_theme'),
      'acf_field' => 'videos'
    ),
    'whitepapers' => array(
      'id' => 'whitepapers',
      'name' => __('Whitepapers', 'microcare_theme'),
      'acf_field' => 'whitepapers'
    ),
    'newsletter' => array(
      'id' => 'newsletter',
      'name' => __('Newsletters', 'microcare_theme'),
      'acf_field' => 'newsletters'
    ),
    'howto' => array(
      'id' => 'howto',
      'name' => __('How-Tos', 'microcare_theme'),
      'acf_field' => 'howtos'
    ),
    'product' => array(
      'id' => 'product',
      'name' => __('Related Products', 'microcare_theme'),
      'acf_field' => ''
    ),
  );
  return $resources;
}
