<?php

add_theme_support("post-thumbnails");
add_theme_support("title-tag");

function include_smarty() {
	if(!class_exists("Smarty")) {
		require_once(get_template_directory()."/smarty/Smarty.class.php");
	}
	$smarty = new Smarty();
	$smarty->template_dir = get_template_directory() . "/templates";
	$smarty->compile_dir = get_template_directory() . "/templates_c";
	return $smarty;
}

add_action("wp_enqueue_scripts", function() {
	wp_enqueue_style("normalize", "https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css");
	wp_enqueue_style("webfont", "https://fonts.googleapis.com/css?family=Noto+Sans+JP&display=swap");
	wp_enqueue_style("style", get_template_directory_uri() . "/style.css");
	wp_enqueue_script("jquery");
	wp_enqueue_script("twitter", "//platform.twitter.com/widgets.js");
	//wp_enqueue_script("script", get_template_directory_uri() . "/assets/script.js");
});
