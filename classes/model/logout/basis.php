<?php 
class model_logout_basis  {
	//----------
	//ログアウト
	//----------
	public static function logout() {
		// セッション削除
		$_SESSION = array();
		session_destroy();
		// クッキー削除
		setcookie('uxseo_id', '', time()-10000, '/');
		setcookie('uxseo_login_key', '',time()-10000, '/');
		header('location: '.HTTP.'seo-tool/analytics/');
		exit;
	}
}