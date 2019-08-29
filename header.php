<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<?php wp_head(); ?>
	<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
	<script>
	     (adsbygoogle = window.adsbygoogle || []).push({
	          google_ad_client: "ca-pub-5119381531318562",
	          enable_page_level_ads: true
	     });
	</script>
</head>
<body <?php body_class(); ?>>

<?php
	get_header();
	$smarty = include_smarty();
	$smarty->display("header.tpl");
