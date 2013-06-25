<?php function llama_slideshow($fieldname) {
		
	$rows = get_field($fieldname);
	if($rows)
	{
		echo '<ul id="slideshowparameters" class="bxslider group">';
	 
		foreach($rows as $row)
		{
			$image = wp_get_attachment_image_src($row['image'], 'hero-home');
			$image_source = $image[0];
			
			$image_small =wp_get_attachment_image_src($row['image'], 'hero-home-small');
			$image_source_small = $image_small[0];
			
			$background_color_picker = $row['background_color_picker'];

			?>
			<li>
				<a class="slide" data-image-source="<?php echo $image_source; ?>" data-image-source-small="<?php echo $image_source_small; ?>" data-alt-text="<?php echo $row['alt_text']; ?>" href="<?php echo $row['url']; ?>">
				</a>
			</li>	
			<?php	
		}

		echo '</ul>';
	} 
}
/* <img src="<?php echo $image_source; ?>" alt="<?php echo $row['alt_text']; ?>" /> */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '51c4a65102efa',
		'title' => 'Home',
		'fields' => 
		array (
			0 => 
			array (
				'key' => 'field_50a3bf1efd9a2',
				'label' => 'Slideshow',
				'name' => 'slideshow',
				'type' => 'repeater',
				'order_no' => '0',
				'instructions' => '',
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
							'value' => '',
						),
					),
					'allorany' => 'all',
				),
				'sub_fields' => 
				array (
					'field_50a3bf2ffd9a3' => 
					array (
						'label' => 'Image',
						'name' => 'image',
						'type' => 'image',
						'instructions' => '',
						'column_width' => '',
						'save_format' => 'id',
						'preview_size' => 'hero-home',
						'order_no' => '0',
						'key' => 'field_50a3bf2ffd9a3',
					),
					'field_50a3c009fd9a4' => 
					array (
						'label' => 'Link to',
						'name' => 'url',
						'type' => 'page_link',
						'instructions' => '',
						'column_width' => '',
						'post_type' => 
						array (
							0 => 'post',
							1 => 'page',
							2 => 'artist',
							3 => 'program'
						),
						'allow_null' => '0',
						'multiple' => '0',
						'order_no' => '1',
						'key' => 'field_50a3c009fd9a4',
					),
					'field_50b51b0ef00cb' => 
					array (
						'label' => 'Alt Text',
						'name' => 'alt_text',
						'type' => 'text',
						'instructions' => 'Please duplicate any type in the image for screenreaders and SEO',
						'column_width' => '',
						'default_value' => '',
						'formatting' => 'html',
						'order_no' => '2',
						'key' => 'field_50b51b0ef00cb',
					),
					'field_504g1b0ef00cb' => 
					array (
						'default_value' => '',
						'key' => 'field_51c9d9590c08f',
						'label' => 'Background Color Picker',
						'name' => 'background_color_picker',
						'type' => 'color_picker',
					),
				),
				'row_min' => '0',
				'row_limit' => '',
				'layout' => 'row',
				'button_label' => 'Add Row',
			)
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'page_template',
					'operator' => '==',
					'value' => 'template-home.php',
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
			),
		),
		'menu_order' => 0,
	));
}


 ?>