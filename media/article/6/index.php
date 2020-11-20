<?php
// core読み込み
require_once('../../../core.php');

$pattern=array('/media/','/article/','/\//');
// 記事id取得
$method = (int)preg_replace($pattern, '', $_SERVER['REQUEST_URI']);
// 記事データ取得
$article_res = model_article_basis::article_get($method);
// 記事データHTML生成
$article_data_array = model_article_html::article_html_create($article_res);
// テンプレート読み込み
require_once(PATH.'view/media/article/template.php');

?>