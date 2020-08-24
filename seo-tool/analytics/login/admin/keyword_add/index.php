<?php
// core読み込み
require_once('../../../../../core.php');
	if($_SESSION) {
		// httpチェック
		if (preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_POST['url'])) {
			// ポストの中身をエンティティ化する
			$post = library_security_basis::post_security();
			// チケット登録
			$analytics_ticket_primary_id = model_analytics_basis::analytics_ticket_add($post);
			$post['analytics_ticket_primary_id'] = $analytics_ticket_primary_id;
			// 133.130.116.136でGooglerを回してjsonでデータ取得(ここではDB登録が主な目的
			$json_array_data = model_analytics_basis::analytics_googler_json_data_get($post);
			// テンプレート読み込み
			require_once(PATH.'view/seo-tool/analytics/login/admin/keyword_add/complete_template.php');
		}
			else {
				// テンプレート読み込み
				require_once(PATH.'view/seo-tool/analytics/login/admin/keyword_add/template.php');
			}
	}
		else {
			// あとでクッキーらへんでログイン記述
		}
?>