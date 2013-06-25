<?php 

function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(/assets/img/login-logo.png) !important;
        background-position: center center !important;
        background-size: auto !important;
        width: 326px !important;
        height: 90px !important;  }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');


function hide_admin_bar_on_small_screens() {
	if( current_user_can( 'manage_options' ) ) {
    echo '<style>@media screen and (max-width: 767px) {
			#wpadminbar {
				display: none !important;
			}
			html { margin-top: 0px !important; }
			* html body { margin-top: 0px !important; }
			
			}</style>';
	}
}

add_action('wp_footer', 'hide_admin_bar_on_small_screens');

?>