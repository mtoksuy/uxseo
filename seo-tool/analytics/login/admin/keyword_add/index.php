<?php
// core読み込み
require_once('../../../../../core.php');
	if($_SESSION) {
		// ポストの中身をエンティティ化する
		$post = library_security_basis::post_security();
		if (preg_match('/^(https?|ftp)(:\/\/[-_.!~*\'()a-zA-Z0-9;\/?:\@&=+\$,%#]+)$/', $_POST['url'])) {
			// チケット登録
			model_analytics_basis::analytics_ticket_add($post);
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