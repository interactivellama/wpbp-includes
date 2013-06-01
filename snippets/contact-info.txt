	<div class="headquarters">
		<address class="author">
			<ul class="group">
				<li class="first">
					<span class="name"><?php the_field('company_name', 'option'); ?></span>
					<span class="location-title"><?php the_field('location_title', 'option'); ?></span>
	
				<?php $map_query = urlencode(get_field('street_address', 'option').', '.get_field('city', 'option').', '.get_field('state', 'option').' '.get_field('zip_code', 'option')); ?>		
			  <a href="http://maps.google.com/maps?q=<?php echo $map_query; ?>" title="View Map" target="_blank">
			  	<span class="street-address">	<?php the_field('street_address', 'option'); ?></span>
			  	<span class="locality"><?php the_field('city', 'option'); ?>, </span> 
			  	<span class="region"><?php the_field('state', 'option'); ?></span> 
			  	<span class="postal-code"><?php the_field('zip_code', 'option'); ?></span></a>
				</li>
				<li>
			  	<span class="tel"><?php the_field('phone_number', 'option'); ?></span>
				</li>
				<li> 
			    <a class="email" href="mailto:<?php the_field('email_address', 'option'); ?>"><span>	<?php the_field('email_address', 'option'); ?></span></a>
				</li>
			</ul>
		</address>
	</div>


  <nav class="nav-footer" role="navigation">
    <?php
      if (has_nav_menu('footer_navigation')) :
        wp_nav_menu(array('theme_location' => 'footer_navigation', 'menu_class' => 'nav nav-pills'));
      endif;
    ?>     
  </nav>
