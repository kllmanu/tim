<?php

/**
 * Plugin Name:     Tim
 * Plugin URI:      https://github.com/kllmanu/tim
 * Description:     A timber context command line debugger
 */

$dir = plugin_dir_path(__FILE__);
$file = $dir . 'context.json';

add_filter('timber_render_data', function($data) use($file) {

	global $wp;
	$current_slug = add_query_arg(array(), $wp->request);

	if(strpos($current_slug, "manifest") === false) {
		file_put_contents($file, json_encode($data, JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_NUMERIC_CHECK));
	}

	return $data;
});
