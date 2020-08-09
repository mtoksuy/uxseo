<?php
// core読み込み
require_once('../core.php');

//pre_var_dump($_POST);

if($_POST['submit'] == '確認') {
	// テンプレート読み込み
	require_once(PATH.'view/plan/confirm_template.php');
}
	else if($_POST['submit'] == '修正する') {
		// テンプレート読み込み
		require_once(PATH.'view/plan/template.php');
	}
		else if($_POST['submit'] == '送信') {
			// ポストの中身をエンティティ化する
			$post = library_security_basis::post_security($_POST);
//pre_var_dump($post);
			// プラン-お問い合わせのレポートメール送信
			model_mail_basis::plan_contact_report_mail($post);
			// プランを選んで頂いたクライアント様へ自動メール(お問い合わせ版)
			model_mail_basis::plan_contact_automatic_mail($post);
			// テンプレート読み込み
			require_once(PATH.'view/plan/submit_template.php');
		}
			else {
				// テンプレート読み込み
				require_once(PATH.'view/plan/template.php');
			}

?>