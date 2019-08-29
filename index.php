<?php

get_header();
$smarty = include_smarty();
if(!filter_input(INPUT_GET, "screen_name")) {
	$ranking = "ユーザ名が入力されていません。";
} elseif(!filter_input(INPUT_GET, "count")) {
	$ranking = "ツイート取得数が入力されていません。";
} elseif(filter_input(INPUT_GET, "count") < 0 || filter_input(INPUT_GET, "count") > 1000) {
	$ranking = "ツイート取得数は1～1000までです。";
} elseif(!ctype_digit(filter_input(INPUT_GET, "count"))) {
	$ranking = "ツイート取得数は半角数字で入力してください。";
} elseif(filter_input(INPUT_GET, "screen_name") && filter_input(INPUT_GET, "count")) {
	$ranking = get_fav_ranking();
}
$smarty->assign("ranking", $ranking);
$smarty->display("index.tpl");

get_footer();
