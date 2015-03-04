<?php

/*
 * Remove generator meta tag from html head
 */
remove_action('wp_head', 'wp_generator');


/*
 * Remove generator from rss/xml feed
 */
function tricd_remove_wp_version_rss()
{
	return'';

}

add_filter('the_generator','tricd_remove_wp_version_rss');

/*
 * Remove version numbers from stylesheet and javascript queues
 */
function tricd_remove_wp_version_css_js_parameter($url)
{
	if (strpos( $url, 'ver=')) {
		$url = remove_query_arg( 'ver', $url );
	}

	return $url;

}

add_filter('style_loader_src', 'tricd_remove_wp_version_css_js_parameter', 9999);
add_filter('script_loader_src', 'tricd_remove_wp_version_css_js_parameter', 9999);