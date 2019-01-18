<?php

namespace App;

$complex_title_templates = array(
	array (
		array (
			'param' => 'page_template',
			'operator' => '==',
			'value' => 'page-ad-landing.php',
		),
	),
);
add_theme_support( 'complex-titles-location', $complex_title_templates );
