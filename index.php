<?php

get_header();
$smarty = include_smarty();

$smarty->display("index.tpl");

get_footer();
