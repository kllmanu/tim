<?php

/**
 * Plugin Name:     Tim
 * Plugin URI:      https://github.com/kllmanu/tim
 * Description:     A timber context command line debugger
 * Author:          manu
 * Author URI:      https://towagmbh.slack.com/team/U038FQ8LMUJ
 */

function tt($var){

}

add_filter('timber/twig', function($twig) {
	$twig->addFunction(new Timber\TwigFunction('tt', 'tt'));
	
	return $twig;
});

add_filter('timber_render_data', function ($data) {
	file_put_contents(plugin_dir_path(__FILE__) . 'context.json', json_encode($data));

	return $data;
});