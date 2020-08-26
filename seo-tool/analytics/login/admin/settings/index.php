<?php
// core読み込み
require_once('../../../../../core.php');
	if($_SESSION) {

	if($_GET['delete'] && $_GET['turn_id']) {
		$_GET['turn_id'] = (int)$_GET['turn_id'];
		// プロパディ削除
		model_analytics_basis::analytics_ticket_delete($_GET['turn_id']);
	}

		// アナリティクスチケット取得
		$analytics_ticket_res = model_analytics_basis::analytics_ticket_get();
		// アナリティクスプロパディリストHTML生成
		$analytics_propaddy_list_html = model_analytics_html::analytics_settings_propaddy_html_list_get($analytics_ticket_res);		
		// テンプレート読み込み
		require_once(PATH.'view/seo-tool/analytics/login/admin/settings/template.php');
	}
		else {
			// クッキーログイン
			model_login_basis::cookie_login();
		}
?>