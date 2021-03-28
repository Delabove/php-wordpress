<?php
/*
Plugin Name: DVS ROI Calculator

Plugin URI: http://localhost:63342/php-wordpress/wordpress%204/

Description: Plugin to calculate partner roi
Version: 1.0
Author: DeLayne LaBove
Author URI: https://delabove.github.io/
License: GPLv2 or later
Text Domain: roi-calculator

*/

if (! defined('ABSPATH') ){
	exit; /* if the absolute path to wordpress is not defined, don't run any code */
}

/* define variable for path to the file to find assets such as scripts or styles easier */
define('ROI_CALC_LOCATION', dirname( __FILE__ ) );
define('ROI_CALC_LOCATION_URL', plugins_url('', __FILE__ ) );

/*Function to register form widget with wordpress*/
function roi_calc_register_form_widget(){
	/*register the new widget called roi calc form widget*/
	register_widget('ROI_CALC_FORM_WIDGET');
}
/*the function is hooked into the widget in its action*/
add_action(wp_widgets_init(), 'roi_calc_register_form_widget');