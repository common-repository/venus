<?php
/*
Plugin Name: venus
Plugin URI: http://wordpress.org/extend/plugins/venus
Description: ziba shodane mohite admine wordpress
Version: 1
Author: cmsaria
License: GPL2
*/
	$version='1';
	
	// For admmin side only //
	function bd_admin()
	{
		wp_register_style( 'blue-admin', plugin_dir_url(__FILE__) . 'style.css.php?t=a', false, $version );
		wp_enqueue_style( 'blue-admin' );
	}
	add_action('admin_enqueue_scripts', 'bd_admin');
	add_action('login_head', 'bd_admin');
	
	// For Client side only //
	function bd_client()
	{
		wp_register_style( 'blue-admin', plugin_dir_url(__FILE__) . 'style.css.php', false, $version );
		wp_enqueue_style( 'blue-admin' );
	}
	add_action('wp_enqueue_scripts', 'bd_client');


	function footer_credit()
	{
		echo '<span id="footer-thankyou">از اینکه از ونوس استفاده می کنید ممنونیم</span>
			<span id="footer-thankyou">افزونه ی ونوس نگارشی راست چین شده از افزونه ی بلوادمین</span>';
	}
	add_filter('admin_footer_text', 'footer_credit'); 
	
		


	// Add meta links
	function blueadmin_actions( $links, $file )
	{
		$plugin = plugin_basename(__FILE__);
		if ($file == $plugin) {
			//$links[] = '<a href="' . admin_url( 'options-general.php?page=blueadmin' ) . '">' . __('Settings', TPTN_LOCAL_NAME ) . '</a>';
			$links[] = '<a href="http://cmsaria.ir">' . __('cmsaria', TPTN_LOCAL_NAME ) . '</a>';
		}
		return $links;
	}
	
	global $wp_version;
	if ( version_compare( $wp_version, '3.2', '>' ) ){add_filter( 'plugin_row_meta', 'blueadmin_actions', 10, 2 ); } // only 2.8 and higher
	else {add_filter( 'plugin_action_links', 'blueadmin_actions', 10, 2 );}

?>