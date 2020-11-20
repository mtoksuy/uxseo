<?php
// core読み込み
require_once('core.php');


/*
$get_num = 5;
$page_num = 1;
// 記事データ取得
$new_article_res = model_article_basis::new_article_list_get($get_num, $page_num);
// 記事データHTML生成
$article_list_html = model_article_html::article_list_html_create($new_article_res);
*/

// 記事データ取得
$new_article_res = model_article_basis::new_article_list_get();
// 記事データHTML生成
$article_list_html = model_article_html::article_list_html_create($new_article_res);

// テンプレート読み込み
require_once(PATH.'view/root/template.php');


?>