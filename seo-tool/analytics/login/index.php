<?php
// core読み込み
require_once('../../../core.php');
	if($_POST) {
		// ポストの中身をエンティティ化する
		$post = library_security_basis::post_security();
		// ログイン
		model_login_basis::login($post);
	}



	// テンプレート読み込み
	require_once(PATH.'view/seo-tool/analytics/login/template.php');



?>