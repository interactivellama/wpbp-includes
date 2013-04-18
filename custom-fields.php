<?php  

/**
 * Activate Add-ons
 * Here you can enter your activation codes to unlock Add-ons to use in your theme. 
 * Since all activation codes are multi-site licenses, you are allowed to include your key in premium themes. 
 * Use the commented out code to update the database with your activation code. 
 * You may place this code inside an IF statement that only runs on theme activation.
 */ 
 
 if(!get_option('acf_repeater_ac')) update_option('acf_repeater_ac', "QJF7-L4IX-UCNP-RF2W");
 if(!get_option('acf_options_page_ac')) update_option('acf_options_page_ac', "OPN8-FA4J-Y2LW-81LS");
// if(!get_option('acf_flexible_content_ac')) update_option('acf_flexible_content_ac', "xxxx-xxxx-xxxx-xxxx");
// if(!get_option('acf_gallery_ac')) update_option('acf_gallery_ac', "xxxx-xxxx-xxxx-xxxx");

/**
 * Register field groups
 * The register_field_group function accepts 1 array which holds the relevant data to register a field group
 * You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 * This code must run every time the functions.php file is read
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '50a1694fa8c86',
		'title' => 'Company Information',
		'fields' => 
		array (
			0 => 
			array (
				'label' => 'Company Name',
				'name' => 'company_name',
				'type' => 'text',
				'instructions' => 'Enter company name',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50a169389c0f5',
				'order_no' => 0,
			),
			1 => 
			array (
				'label' => 'Location Title',
				'name' => 'location_title',
				'type' => 'text',
				'instructions' => 'Headquarters?',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50a169389c0f5b',
				'order_no' => 0,
			),
			2 => 
			array (
				'label' => 'Street Address',
				'name' => 'street_address',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50a16938a141d',
				'order_no' => 1,
			),
			3 => 
			array (
				'label' => 'P.O. Box',
				'name' => 'po_box',
				'type' => 'text',
				'instructions' => '(optional)',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50a16938a1c07',
				'order_no' => 2,
			),
			4 => 
			array (
				'label' => 'City',
				'name' => 'city',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a16938a21c7',
				'order_no' => 3,
			),
			5 => 
			array (
				'label' => 'State',
				'name' => 'state',
				'type' => 'text',
				'instructions' => 'Two letter postal abbreviation',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a16938a2792',
				'order_no' => 4,
			),
			6 => 
			array (
				'label' => 'Zip Code',
				'name' => 'zip_code',
				'type' => 'text',
				'instructions' => '5-digit zip code',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a16938a7c22',
				'order_no' => 5,
			),
			7 => 
			array (
				'label' => 'Phone number',
				'name' => 'phone_number',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a16938aef2e',
				'order_no' => 6,
			),
			8 => 
			array (
				'label' => 'General Email Address',
				'name' => 'email_address',
				'type' => 'text',
				'instructions' => '',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a16938af70b',
				'order_no' => 7,
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'Options',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => '0',
	));
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
		'id' => '50a1670b7ef42',
		'title' => 'Social Media',
		'fields' => 
		array (
			0 => 
			array (
				'label' => 'Facebook URL',
				'name' => 'facebook_url',
				'type' => 'text',
				'instructions' => 'URL to Facebook Page',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a166fa3a041',
				'order_no' => 0,
			),
			1 => 
			array (
				'label' => 'LinkedIn URL',
				'name' => 'linkedin_url',
				'type' => 'text',
				'instructions' => 'URL to LinkedIn Page',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a166fa3e622',
				'order_no' => 1,
			),
			2 => 
			array (
				'label' => 'YouTube URL',
				'name' => 'youtube_url',
				'type' => 'text',
				'instructions' => 'URL to LinkedIn Page',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a166fa3ed3e',
				'order_no' => 2,
			),
			3 => 
			array (
				'label' => 'Twitter URL',
				'name' => 'twitter_url',
				'type' => 'text',
				'instructions' => 'URL to Twitter Page',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50a166faasdf3e',
				'order_no' => 3,
			)
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'options_page',
					'operator' => '==',
					'value' => 'Options',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'default',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => '0',
	));
}


 ?>