<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link              http://localhost:63342/php-wordpress/wordpress%204/
 * @since             1.0.0
 * @package           dvs_roi_calculator
 * @subpackage Dvs_Roi_Calculator/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 *  @since      1.0.0
 * @package    Dvs_Roi_Calculator
 * @subpackage Dvs_Roi_Calculator/admin
 * @author     DeLayne LaBove <delayne@wearetribu.com>
 */

class Dvs_Roi_Calculator_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $dvs_roi_calculator    The ID of this plugin.
	 */
	private string $dvs_roi_calculator ;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private string $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $dvs_roi_calculator     The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct(string $dvs_roi_calculator, string $version ) {

		$this->dvs_roi_calculator = $dvs_roi_calculator;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

	wp_enqueue_style( $this->dvs_roi_calculator, plugin_dir_url( __FILE__ ) . 'css/style.css', array(), $this->version, 'all' );
//   wp_enqueue_style( 'bootstrap-css', plugin_dir_url( _FILE_ ) . 'css/bootstrap.min.css', array(), $this->version, 'all' );


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Plugin_Name_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Plugin_Name_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

wp_enqueue_script( $this->dvs_roi_calculator, plugin_dir_url( __FILE__ ) . 'js/dvs-roi-calculator-admin.js', array( 'jquery' ), $this->version, false );
//wp_enqueue_script( 'bootstrap-js', plugin_dir_url( _FILE_ ) . 'js/bootstrap.min.js', array( 'jquery' ), $this->version, false );
//		wp_enqueue_script( 'bootstrap', plugin_dir_url( __FILE__ ). 'admin/js/bootstrap.min.js', array('jquery'), NULL, true );

	}

	/**
	 * Add top level custom menu
	 *
	 * @since    1.0.0
	 */

	function my_admin_menu(){

		add_menu_page('New Plugin Settings', 'ROI Calc Settings', 'manage_options', 'dvs-roi-calculator/mainsettings.php', array($this, 'my_admin_page'), 'dashicons-chart-pie', 1 );
		add_submenu_page('dvs-roi-calculator/mainsettings.php', 'Submenu', 'Calculator Submissions', 'edit_posts', 'dvs-roi-calculator/submenu-page.php', array($this, 'my_admin_sub_page'), null );

	}

	public function my_admin_page(){
		//return view
		require_once 'partials/dvs-roi-calculator-admin-display.php';
	}

	public function my_admin_sub_page(){
		require_once 'partials/submenu-page.php';
	}

	/**
	 * Register custom fields for plugin settings
	 *
	 * @since    1.0.0
	 */

	public function register_calculator_settings(){
		register_setting('plugin_custom_settings', 'useremail');
		register_setting('plugin_custom_settings', 'numbers');
		register_setting('plugin_custom_settings', 'multiselect');


	}

}
