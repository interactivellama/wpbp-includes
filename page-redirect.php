<?php

// Requires page redirect page template (page-redirect.php)
// Call llama_page_redirect() from base.php, before any output

function llama_page_redirect() {	

	if(llama_page_template('page-redirect') && function_exists("get_field")) {

		$page_destination = _get_field('page_destination');

		if($page_destination) {
			$id = $page_destination->ID;
			// temporary redirect
			wp_redirect( get_permalink($id), '302' ); 
			exit;	
		}

	}		

}


/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '50a3fbb35c5af',
		'title' => 'Page Redirect',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50a3fa72992b2',
				'label' => 'Page Destination',
				'name' => 'page_destination',
				'type' => 'post_object',
				'order_no' => '0',
				'instructions' => 'Select a page to redirect this "placeholder" to.',
				'required' => '0',
				'conditional_logic' => 
				array (
					'status' => '0',
					'rules' => 
					array (
						0 => 
						array (
							'field' => 'null',
							'operator' => '==',
						),
					),
					'allorany' => 'all',
				),
				'post_type' => 
				array (
					0 => '',
				),
				'taxonomy' => 
				array (
					0 => 'all',
				),
				'allow_null' => '0',
				'multiple' => '0',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'page-redirect.php',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
				0 => 'the_content',
				1 => 'excerpt',
				2 => 'custom_fields',
				3 => 'discussion',
				4 => 'comments',
				5 => 'revisions',
				6 => 'format',
				7 => 'featured_image',
				8 => 'send-trackbacks',
			),
		),
		'menu_order' => 0,
	));
}
 ?>