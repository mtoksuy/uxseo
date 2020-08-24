<?php
// core読み込み
require_once('../../../core.php');

if($_POST) {
	// ポストの中身をエンティティ化する
	$post = library_security_basis::post_security();
	// uxseo_idが使われてるかどうか
	$user_uxseo_id_check = model_signup_basis::uxseo_id_check($post);
	// メールアドレスをチェックする
	$user_email_check = model_signup_basis::email_check($post);
	// パスワードをチェックする
	$user_password_check = model_signup_basis::password_check($post);


	// 新規登録成功
	if($user_uxseo_id_check === true && $user_email_check === true && $user_password_check === true) {
		// ユーザー仮登録
		model_signup_basis::user_signup_confirm($post);
		// テンプレート読み込み
		require_once(PATH.'view/seo-tool/analytics/signup/complete/template.php');	
	}
		// それ以外
		else {
			// テンプレート読み込み
			require_once(PATH.'view/seo-tool/analytics/signup/template.php');
		}
}
	else {
		// テンプレート読み込み
		require_once(PATH.'view/seo-tool/analytics/signup/template.php');
	}
?>