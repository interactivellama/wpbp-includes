<?php  

 
 /**
 *  Install Add-ons
 *  
 *  The following code will include all 4 premium Add-Ons in your theme.
 *  Please do not attempt to include a file which does not exist. This will produce an error.
 *  
 *  All fields must be included during the 'acf/register_fields' action.
 *  Other types of Add-ons (like the options page) can be included outside of this action.
 *  
 *  The following code assumes you have a folder 'add-ons' inside your theme.
 *
 *  IMPORTANT
 *  Add-ons may be included in a premium theme as outlined in the terms and conditions.
 *  However, they are NOT to be included in a premium / free plugin.
 *  For more information, please read http://www.advancedcustomfields.com/terms-conditions/
 */ 

// Fields 
add_action('acf/register_fields', 'my_register_fields');

function my_register_fields()
{
	//include_once('add-ons/acf-repeater/repeater.php');
	//include_once('add-ons/acf-gallery/gallery.php');
	//include_once('add-ons/acf-flexible-content/flexible-content.php');
}

// Options Page 
//include_once( 'add-ons/acf-options-page/acf-options-page.php' );


/**
 *  Register Field Groups
 *
 *  The register_field_group function accepts 1 array which holds the relevant data to register a field group
 *  You may edit the array as you see fit. However, this may result in errors if the array is not compatible with ACF
 */

 
/* =====================================================
Headline for CMS static pages
===================================================== */


if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_page-headline',
		'title' => 'Page Headline',
		'fields' => array (
			array (
				'key' => 'field_51749bb81648d',
				'label' => 'Headline',
				'name' => 'headline',
				'type' => 'text',
				'instructions' => 'Headline for static pages, so that the page title isn\'t used as the headline.',
				'default_value' => '',
				'formatting' => 'html',
			),
		),
		'location' => array (
			'rules' => array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
				),
			),
			'allorany' => 'all',
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

/* =====================================================
Options Page Custom Fields
===================================================== */
 

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

// Admin Only fields

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_admin-only',
		'title' => 'Admin Only',
		'fields' => array (
			array (
				'key' => 'field_51a64224f04a5',
				'label' => 'Notes for Administrators',
				'name' => 'admin_notes',
				'type' => 'textarea',
				'instructions' => 'This is a place for notes among admins and/or developers. Please review this field if you are new to the site. Feel free to add any notes that would be helpful',
				'default_value' => '',
				'formatting' => 'br',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'side',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}



 ?>