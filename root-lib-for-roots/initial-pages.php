<?php 
// create pages

// Function that outputs the contents of the dashboard widget
function dashboard_widget_function() {
	echo "This is just a simple notice.";
}

// Function used in the action hook
function llama_dashboard_initial_pages_status() {
	wp_add_dashboard_widget('llama_dashboard_initial_pages_status', 'WARNING: Inital Pages will load on theme initiation!', 'dashboard_widget_function');
}

// Register the new dashboard widget with the 'wp_dashboard_setup' action
add_action('wp_dashboard_setup', 'llama_dashboard_initial_pages_status' );

add_action('after_switch_theme','llama_define_initial_pages');

function llama_define_initial_pages() {

$lorem = 'Veggies sunt bona vobis, proinde vos postulo esse magis earthnut pea jícama chickweed collard greens bitterleaf mustard grape lettuce cabbage leek fennel.

Kombu chard gumbo turnip sorrel rutabaga aubergine bunya nuts parsnip parsley watercress beet greens broccoli rabe lotus root groundnut brussels sprout. Parsley salsify courgette fava bean bok choy shallot sorrel. Quandong groundnut garlic cabbage potato bok choy.

Nori dulse garlic sorrel gourd taro mustard caulie courgette chicory tigernut water chestnut. Aubergine celtuce green bean grape bunya nuts turnip beet greens amaranth soko spring onion broccoli sorrel garbanzo gourd plantain. Gourd tatsoi bunya nuts daikon welsh onion artichoke turnip kombu shallot scallion cucumber amaranth. Beet greens dandelion yarrow komatsuna broccoli rabe courgette water spinach taro radish melon fava bean. Radicchio broccoli potato summer purslane catsear black-eyed pea desert raisin nori.';


	$pages = array(
	    // Home page added by roots
	    array(
	        'title' => 'About',
					'template' => array(
		        'post_type' => 'page',
		        'post_status' => 'publish',
		        'post_author' => 1,
		        'template_file' => 'page-about.php',
		        'post_content' => $lorem
	        ),
	        'child' => array("")
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
	        'child' => array("")
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
