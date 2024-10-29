<?php

/*
Plugin Name: Advanced Custom Fields: Date Selector
Description: ACF Field to select a date with select drop downs rather than the typical popup date picker. Very usefull for selecting Age/Date of Birth.
Version: 1.0.0
Author: Ken Key
Author URI: https://www.kennyey.com
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


// check if class already exists
if( !class_exists('acf_plugin_date_selector') ) :

class acf_plugin_date_selector {

	var $settings;

	function __construct() {
		$this->settings = array(
			'version'	=> '1.0.0',
			'url'		=> plugin_dir_url( __FILE__ ),
			'path'		=> plugin_dir_path( __FILE__ ),
			'enqueue_select2' => true
		);

		add_action('acf/include_field_types', 	array($this, 'include_field')); // v5
		add_action('acf/register_fields', 		array($this, 'include_field')); // v4
	}

	function include_field( $version = false ) {

		// support empty $version
		if( !$version ) $version = 4;


		// load textdomain
		load_plugin_textdomain( 'TEXTDOMAIN', false, plugin_basename( dirname( __FILE__ ) ) . '/lang' );


		// include
		include_once('fields/class-acf-field-date-selector.php');
	}

}


// initialize
new acf_plugin_date_selector();


// class_exists check
endif;

?>
