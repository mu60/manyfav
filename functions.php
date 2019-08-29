<?php

add_theme_support("post-thumbnails");
add_theme_support("title-tag");

function include_smarty() {
	if(!class_exists("Smarty")) {
		require_once(get_template_directory()."/lib/smarty/Smarty.class.php");
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

// TwitterAPIのコード。絶対にgitignoreすること。
require_once(get_template_directory()."/twitter.php");

// TwitterOAuthクラスをインポート
use Abraham\TwitterOAuth\TwitterOAuth;

function include_twitter() {
	// TwitterOAuthライブラリを読み込み
	require get_template_directory().'/lib/twitteroauth/autoload.php';

	// Twitter APIを利用する認証情報。xxxxxxxxの箇所にそれぞれの情報を指定
	$CK = TWITTER_CK; // Consumer Keyをセット
	$CS = TWITTER_CS; // Consumer Secretをセット
	$AT = TWITTER_AT; // Access Tokenをセット
	$AS = TWITTER_AS; // Access Token Secretをセット

	// TwitterOAuthクラスのインスタンスを作成
	$connect = new TwitterOAuth( $CK, $CS, $AT, $AS );
	return $connect;
}

function debug($val) {
	echo "<pre><code>";
	var_dump($val);
	echo "</code></pre>";
}

function test() {
	$connect = include_twitter();
	$statuses = $connect->get(
		'statuses/user_timeline',
		// 取得するツイートの条件を配列で指定
		array(
			// ユーザー名（@は不要）
			'screen_name' => 'wiredpunch',
			// ツイート件数
			'count' => '5',
			// リプライを除外するかを、true（除外する）、false（除外しない）で指定
			'exclude_replies' => 'true',
			// リツイートを含めるかを、true（含める）、false（含めない）で指定
			'include_rts' => 'false'
		)
	);
	debug($statuses);
}
