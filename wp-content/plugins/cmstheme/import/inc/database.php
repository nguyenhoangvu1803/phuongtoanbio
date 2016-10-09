<?php

/**
 * CMS Theme Import Data
 * User: zacky
 * Date: 12/21/2015
 * Time: 9:17 PM
 */
class CMS_Database {

	/**
	 * @param $file
	 * @param $demo_url
	 * @param $site_url
	 *
	 * @return bool
	 */
	public function import( $file, $demo_url, $site_url ) {
		global $wpdb;
		$data    = file( $file );
		$tempdata = '';	
		foreach ($data as $line)
		{
			// Skip it if it's a comment
			if (substr($line, 0, 2) == '--' || $line == '')
				continue;
			// Add this line to the current segment
			$tempdata .= $line;
			// If it has a semicolon at the end, it's the end of the query
			if (substr(trim($line), -1, 1) == ';')
			{
				// Perform the query
				$tempdata = str_replace( '`wp_', "`{$wpdb->prefix}", $tempdata );
				$tempdata = str_replace( $demo_url, $site_url, $tempdata );
				$tempdata = str_replace( $this->replace_link_rs($demo_url), $this->replace_link_rs($site_url), $tempdata );
				$tempdata = str_replace( $this->replace_link_vc($demo_url), $this->replace_link_vc($site_url), $tempdata );
				$wpdb->query( $tempdata );
				// Reset temp variable to empty
				$tempdata = '';
			}
		}
	}

	/**
	 * Update Website URL
	 * @param $site_url
	 */
	public function update_site_url($site_url) {
		global $wpdb;

		$query   = "SELECT meta_key FROM {$wpdb->prefix}usermeta WHERE meta_key LIKE 'wp_%'";
		$results = $wpdb->get_results( $query );
		foreach ( $results as $res ) {
			$meta_key = str_replace( 'wp_', $wpdb->prefix, $res->meta_key );
			$query    = "UPDATE `{$wpdb->prefix}usermeta` SET `meta_key` = '{$meta_key}' WHERE `meta_key` = '{$res->meta_key}'";
			$wpdb->query( $query );
		}
		$wpdb->query( "UPDATE `{$wpdb->prefix}options` SET `option_value` = '{$site_url}' WHERE `option_name` = 'siteurl'" );
		$wpdb->query( "UPDATE `{$wpdb->prefix}options` SET `option_value` = '{$site_url}' WHERE `option_name` = 'home'" );
		$wpdb->query( "UPDATE `{$wpdb->prefix}options` SET `option_name` = '{$wpdb->prefix}user_roles' WHERE `option_name` = 'wp_user_roles'" );
	}

	/**
	 * Update Theme Options Links
	 * @param $demo_url
	 * @param $site_url
	 */
	public function update_theme_options($demo_url, $site_url) {
		global $wpdb;

		$query   = "SELECT * FROM `{$wpdb->prefix}options` WHERE option_value LIKE '%:\"{$site_url}%'";
		$results = $wpdb->get_results( $query );

		foreach ( $results as $res ) {
			//Rollback Demo URL
			$option_value = str_replace( $site_url, $demo_url, $res->option_value );

			if( @unserialize($option_value) !== false ) {

				$option_value = unserialize($option_value);
				$this->replace($demo_url, $site_url, $option_value);
				$option_value = serialize($option_value);

				$query = "UPDATE `{$wpdb->prefix}options` SET `option_value` = '{$option_value}' WHERE `option_id` = " . $res->option_id;
				$wpdb->query( $query );
			}
		}
	}

	/**
	 * Find And Replace String In Array
	 *
	 * @param $array
	 * @param $find
	 * @param $replace
	 */
	public function replace($find, $replace, &$array) {
		foreach($array as $k => $v) {
			if(is_array($v)) {
				$this->replace($find, $replace, $array[$k]);
			} else {
				$array[$k] = str_replace($find, $replace, $v);
			}
		}
	}

	/**
	 * Replace Link Same Revolution Link Save
	 *
	 * @param $url
	 */
	public function replace_link_rs($url) {
		$url_temp = explode("/",$url);
		$url_on_rs = ''; $i = 0;
		for($i ; $i < count($url_temp) ; $i++){
			if($i < count($url_temp) - 1)
				$url_on_rs .= $url_temp[$i] . '\\\/';
			else
				$url_on_rs .= $url_temp[$i] ;
		}
		return $url_on_rs;
	}
	
	/**
	 * Replace Link Same Visual Composer Link Save
	 *
	 * @param $url
	 */
	public function replace_link_vc($url) {
		$url_on_vc = ''; 
		$url_on_vc = str_replace("/", "%2F", $url);
		$url_on_vc = str_replace(":", "%3A", $url_on_vc);
		return $url_on_vc;
	}
}