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


 ?>