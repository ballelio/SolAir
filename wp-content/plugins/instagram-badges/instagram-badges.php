<?php
/*
Plugin Name: Instagram Badges
Plugin URI: https://sparanoid.com/work/instagram-badges/
Description: Adds Instagram badges to your WordPress blog that will help you link to and promote your Instagram profile.
Version: 1.1.12
Author: Tunghsiao Liu
Author URI: https://sparanoid.com/
Author Email: t@sparanoid.com
Text Domain: instagram-badges
Domain Path: /lang/
Network: false
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

  Copyright 2018 Tunghsiao Liu (t@sparanoid.com)

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License, version 2, as
  published by the Free Software Foundation.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program; if not, write to the Free Software
  Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/

// TODO: change 'Instagram_Badges' to the name of your actual plugin
class Instagram_Badges extends WP_Widget {

	/*--------------------------------------------------*/
	/* Constructor
	/*--------------------------------------------------*/

	/**
	 * The widget constructor. Specifies the classname and description, instantiates
	 * the widget, loads localization files, and includes necessary scripts and
	 * styles.
	 */
	public function __construct() {

		// Manage plugin ativation/deactivation hooks
		register_activation_hook( __FILE__, array( $this, 'activate' ) );
		register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );

		// TODO: update classname and description
		// TODO: replace 'instagram-badges' to be named more plugin specific. other instances exist throughout the code, too.
		parent::__construct(
			'instagram-badges', // widget-name-id
			__( 'Instagram Badges', 'instagram-badges' ),
			array(
				'classname'		=>	'instagram-badges', // widget-name-class
				'description'	=>	__( 'Short description of the widget goes here.', 'instagram-badges' )
			)
		);

		// load plugin text domain
		add_action( 'init', array( $this, 'textdomain' ) );

		// Register admin styles and scripts
		add_action( 'admin_print_styles', array( $this, 'register_admin_styles' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'register_admin_scripts' ) );

		// Register site styles and scripts
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_styles' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'register_widget_scripts' ) );

	} // end constructor

	/*--------------------------------------------------*/
	/* Widget API Functions
	/*--------------------------------------------------*/

	/**
	 * Outputs the content of the widget.
	 *
	 * @args			The array of form elements
	 * @instance		The current instance of the widget
	 */
	public function widget( $args, $instance ) {

		extract( $args, EXTR_SKIP );

		echo $before_widget;

    	// TODO: This is where you retrieve the widget values.
    	// Note that this 'Title' is just an example
    	$title      = apply_filters('widget_title',      empty( $instance['title'] ) ? __( '', 'instagram-badges' ) : $instance['title'], $instance, $this->id_base);
    	$username   = apply_filters('widget_username',   empty( $instance['username'] ) ? __( '', 'instagram-badges' ) : $instance['username'], $instance, $this->id_base);
    	$badge_size = apply_filters('widget_badge_size', empty( $instance['badge_size'] ) ? __( 'v_24', 'instagram-badges' ) : $instance['badge_size'], $instance, $this->id_base);
    	$new_window = apply_filters('widget_new_window', empty( $instance['new_window'] ) ? __( '', 'instagram-badges' ) : $instance['new_window'], $instance, $this->id_base);

		include( plugin_dir_path( __FILE__ ) . '/views/widget.php' );

		echo $after_widget;

	} // end widget

	/**
	 * Processes the widget's options to be saved.
	 *
	 * @new_instance	The previous instance of values before the update.
	 * @old_instance	The new instance of values to be generated via the update.
	 */
	public function update( $new_instance, $old_instance ) {

		$instance = $old_instance;

		// TODO Update the widget with the new values
		// Note that this 'Title' is just an example
		$instance['title']         = strip_tags( $new_instance['title'] );
		$instance['username']      = strip_tags( $new_instance['username'] );
		$instance['badge_size']    = strip_tags( $new_instance['badge_size'] );
    $instance['new_window']    = strip_tags( $new_instance['new_window'] );

		return $instance;

	} // end widget

	/**
	 * Generates the administration form for the widget.
	 *
	 * @instance	The array of keys and values for the widget.
	 */
	public function form( $instance ) {

    	// TODO define default values for your variables
		$instance = wp_parse_args(
			(array) $instance,
			array(
				'title'       => __( '', 'instagram-badges' ),
				'username'    => __( '', 'instagram-badges' ),
				'badge_size'  => __( 'v_24', 'instagram-badges' ),
        'new_window'  => __( '', 'instagram-badges' ),
			)
		);

		// TODO store the values of widget in a variable

		// Display the admin form
		include( plugin_dir_path(__FILE__) . '/views/admin.php' );

	} // end form

	/*--------------------------------------------------*/
	/* Public Functions
	/*--------------------------------------------------*/

	/**
	 * Fired when the plugin is activated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function activate( $network_wide ) {
		// TODO define activation functionality here
	} // end activate

	/**
	 * Fired when the plugin is deactivated.
	 *
	 * @params	$network_wide	True if WPMU superadmin uses "Network Activate" action, false if WPMU is disabled or plugin is activated on an individual blog
	 */
	public function deactivate( $network_wide ) {
		// TODO define deactivation functionality here
	} // end deactivate

	/**
	 * Load the plugin text domain on "init"
	 */
	public function textdomain() {
		// TODO be sure to change 'widget-name' to the name of *your* plugin
		load_plugin_textdomain( 'instagram-badges', false, plugin_dir_path( __FILE__ ) . '/lang/' );
	}

	/**
	 * Registers and enqueues admin-specific styles.
	 */
	public function register_admin_styles() {

		// TODO change 'widget-name' to the name of your plugin
    // wp_enqueue_style( 'instagram-badges-admin-styles', plugins_url( 'instagram-badges/css/admin.css' ) );

	} // end register_admin_styles

	/**
	 * Registers and enqueues admin-specific JavaScript.
	 */
	public function register_admin_scripts() {

		// TODO change 'widget-name' to the name of your plugin
    // wp_enqueue_script( 'instagram-badges-admin-script', plugins_url( 'instagram-badges/js/admin.js' ) );

	} // end register_admin_scripts

	/**
	 * Registers and enqueues widget-specific styles.
	 */
	public function register_widget_styles() {

		// TODO change 'widget-name' to the name of your plugin
		wp_enqueue_style( 'instagram-badges-widget-styles', plugins_url( 'instagram-badges/css/widget.css' ) );

	} // end register_widget_styles

	/**
	 * Registers and enqueues widget-specific scripts.
	 */
	public function register_widget_scripts() {

		// TODO change 'widget-name' to the name of your plugin
    // wp_enqueue_script( 'instagram-badges-script', plugins_url( 'instagram-badges/js/widget.js' ) );

	} // end register_widget_scripts

} // end class

// TODO remember to change 'Instagram_Badges' to match the class name definition
add_action( 'widgets_init', create_function( '', 'register_widget("Instagram_Badges");' ) );
