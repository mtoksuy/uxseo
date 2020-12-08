<?php
// core読み込み
require_once('../core.php');

// 全記事リスト取得
$article_res = model_sitemap_basis::article_list_get();
// 全記事リストHTML生成
$li_html_list = model_sitemap_html::article_list_html_create($article_res);
// テンプレート読み込み
require_once(PATH.'view/sitemap/template.php');
?>