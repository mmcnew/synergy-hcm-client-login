<?php
/*
  Plugin Name: Synergy HCM Client Login Shortcode
  Plugin URI: http://www.visceralconcepts.com
  Description: A shortcode to add the Client Login form provided by Synergy HCM into a WordPress site using only a shortcode.
  Version: 1.1
  Author: Visceral Concepts
  Author URI: http://www.visceralconcepts.com
  License: GPLv3 or Later
 */
 
// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/*
  Before the plugin does anything, we check for updates.
*/

require_once( 'inc/vc-plugin-updater.php' );
if ( is_admin() ) {
    new Login_Plugin_Updater( __FILE__, 'mmcnew', 'synergy-hcm-client-login' );
}


//Load CSS & Scripts

add_action( 'wp_enqueue_scripts', 'login_scripts', 16 );
function login_scripts() {

	wp_register_style( 'login-css', plugin_dir_url(__FILE__) . 'css/login-style.css' );
	wp_enqueue_style( 'login-css' );

}

// Shortcode Construct
function hcm_login( $atts ) {
    return "<div id='LoginArea'>
    			<form action='https://secure.saashr.com/ta/Synergy.login' method='post'>
					<font color=red>
						<script src='http://www.saashr.com/ta/js/loginmsg.js'></script>
					</font>
					<input type='text' name='Username' class='input' placeholder='Username' holder='Username' id='username'/>
					<input type='password' name='Password' class='input' placeholder='Password' holder='Password' id='password'/>
					<input type='submit' name='LoginButton' value='Client Login' >
					<input type='hidden' value='index.html' name='LoginURL'>
					</form>
				</div>";
}
add_shortcode( 'login', 'hcm_login' );
