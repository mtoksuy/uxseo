<?php
// core読み込み
require_once('../../core.php');



if($_POST['submit']) {
	$json = file_get_contents('http://133.130.116.136/?url='.preg_replace('/\//', 'すらっしゅ', $_POST['url']).
	'&keyword_1='.preg_replace('/ /', 'げろげろ空白', $_POST['keyword_1']).
	'&keyword_2='.preg_replace('/ /', 'げろげろ空白', $_POST['keyword_2']).
	'&keyword_3='.preg_replace('/ /', 'げろげろ空白', $_POST['keyword_3']).
	'');
//pre_var_dump($json);
//pre_var_dump(json_decode($json));
$json_array_data = json_decode($json);
//var_dump($json_array_data);
	// 
	require_once(PATH.'view/seo-tool/analytics/submit/template.php');
}
	else {
		require_once(PATH.'view/seo-tool/analytics/template.php');
	}
?>