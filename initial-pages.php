<?php 
// create pages

add_action('after_switch_theme','llama_define_initial_pages');

function llama_define_initial_pages() {

$lorem = 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Ut ultricies posuere nisi. Sed hendrerit tempor purus. Nunc mauris sem, tincidunt ac, pellentesque sit amet, rutrum id, quam. Pellentesque diam. Vestibulum dignissim pede ac velit. Curabitur a tellus a massa porta tempor. Duis dolor turpis, iaculis vel, dictum non, tempus a, risus. Ut ac mauris nec tortor venenatis fermentum. Nulla mollis elementum elit. Phasellus cursus lobortis lacus. Proin nec dolor. Nulla facilisi.

Morbi consectetuer leo quis pede. Vestibulum id diam. Phasellus eu justo at ipsum lacinia sodales. Morbi iaculis. Quisque vel odio. Vivamus interdum elementum mauris. Donec porta. Vivamus ligula. Fusce volutpat aliquet sem. Cras nec erat. Vivamus ipsum. Sed quam. Quisque magna. Curabitur consequat nisl nec quam. Proin luctus luctus dui. In id nunc. Vivamus facilisis. Duis pellentesque ultricies tortor.';


	$pages = array(
	    array(
	        'title' => 'Home',
	        'template' => array(
  	        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'post_content' => $lorem
	        ), // hidden child pages (usually)
	        'child' => array("Employee Resources", "Employee Resources", "Request An Appointment"
	        )
	    ),
	    
	    array(
	        'title' => 'About',
	        'template' => array(
  	        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'template_file' => 'page-about.php',
		        'post_content' => $lorem
	        ),
	        'child' => array("HISTORY","LEADERSHIP","WHY KOORSEN","NEWS & VIEWS - LINK","LOCATIONS-Link","KOORSEN MUSEUM","IN THE COMMUNITY","WORK FOR US"
	        )
	    ),
	    
	    array(
	        'title' => 'Products and Services',
					'template' => array(
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'template_file' => 'page-products.php',
		        'post_content' => $lorem
	        ),
	        'child' => array("FIRE EXTINGUISHERS", "GENERAL FIRE", "PRODUCTS", "EMERGENCY/EXIT", "LIGHTING", "FIRE ALARM SYSTEMS", "FIRE SPRINKLER", "SYSTEMS", "KITCHEN FIRE", "SUPPRESSION", "SYSTEMS", "FIRE SUPPRESSIONS", "SYSTEMS", "SECURITY", "COMMUNICATIONS", "MONITORING", "VEHICLE FIRE", "SUPPRESSION", "HOME SECURITY"
	  	    )
	  	),
	  	
	    array(
	        'title' => 'NEWS & VIEWS',
					'template' => array(
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'post_content' => $lorem
	        )
	  	),
	  	
	  	array(
	        'title' => 'Locations',
					'template' => array(
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'template_file' => 'page-locations.php',
		        'post_content' => $lorem
	        ),
	        'child' => array("ALABAMA", "HUNTSVILLE,AL", "FLORIDA", "FT. WALTON BEACH. FL", "PENSACOLA. FL", "INDIANA", "BLOOMINGTON. IN", "COLUMBUS. IN", "EVANSVILLE. IN", "FT. WAYNE. IN", "INDIANAPOLIS. IN", "KOKOMO. IN", "MUNCIE. IN", "RICHMOND. IN", "SOUTH BEND. IN", "TERRE HAUTE. IN", "KENTUCKY", "LEXINGTON. KY", "LOUISVILLE. KY", "OHIO", "CINCINNATI. OH", "COLUMBUS. OH", "DAYTON. OH", "TENNESSEE", "NASHVILLE. TN", "NATIONAL ACCOUNTS"
	  	    )
	  	),
	  	
	  	array(
	        'title' => 'Contact',
					'template' => array(
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'template_file' => 'page-contact.php',
		        'post_content' => $lorem
	        ),
	        'child' => array("MAKE A PAYMENT", "MAIN ADDRESS", "DIRECTORY", "LOCATIONS-Link", "CAREERS", "SOCIAL MEDIA"
	  	    )
	  	),
	  		  	
	);
		
		llama_initial_page_create($pages);

}

function llama_initial_page_create($pages) {	
	    foreach( $pages as $page ) {
        $exists = get_page_by_title( $page['title'] );
        $my_page = array(
            'post_name'  => sanitize_title( strtolower($page['title']) ),
            'post_title' => ucwords(strtolower($page['title'] )),
            'post_content' => $page['template']['post_content'],
            'post_author' => $page['template']['post_author'],
            'post_type' => $page['template']['post_type'],
            'post_status' => $page['template']['post_status']
        );


        $id = ( $exists ? $exists->ID : wp_insert_post( $my_page ) );
        
        if (!$id) {
		        wp_die('Error creating template page');
		    } else {
		    		if(isset($page['template']['template_file'])) {
			        update_post_meta($id, '_wp_page_template', $page['template']['template_file']);
		        }
		    }

        if( isset( $page['child'] ) ) {
            foreach( $page['child'] as $value ) {
                $child_id = get_page_by_title( $value );
                $child_page = array(
                    'post_name'   => sanitize_title( strtolower($value) ),
				            'post_content' => $page['template']['post_content'],
                    'post_title'  => ucwords(strtolower($value)),
                    'post_parent' => $id
                );
                
                $child_page = array_merge( $child_page, $page['template'] );
                if( !isset( $child_id )) {
	                $child_id = ( $exists ? $exists->ID : wp_insert_post( $child_page ) );
                  if (!$child_id) {
						        wp_die('Error creating template page');
							    } 
							    else {
						    		if(isset($page['template']['template_file'])) {
							        update_post_meta($child_id, '_wp_page_template', $page['template']['template_file']);
						        }
					        }
					      }
            }
        }
    }
	
}

                


 ?>
 
 
 