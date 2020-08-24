<?php
// core読み込み
require_once('../../core.php');

if($_POST['submit']) {
	// ポストの中身をエンティティ化する
	$post = library_security_basis::post_security();
	// 133.130.116.136でGooglerを回してjsonでデータ取得
	$json_array_data = model_analytics_basis::analytics_googler_json_data_get($post);
	// html表示
	require_once(PATH.'view/seo-tool/analytics/submit/template.php');
}
	else {
		require_once(PATH.'view/seo-tool/analytics/template.php');
	}
?>