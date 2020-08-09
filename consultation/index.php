<?php
// core読み込み
require_once('../core.php');

if($_POST['submit'] == 'Slackの招待を送ってもらう') {
	// ポストの中身をエンティティ化する
	$post = library_security_basis::post_security($_POST);
	//pre_var_dump($post);
	// SEOの相談レポートメール送信
	model_mail_basis::consultation_report_mail($post);
	// SEOの相談 クライアント様へ自動メール
	model_mail_basis::consultation_automatic_mail($post);
	// テンプレート読み込み
	require_once(PATH.'view/consultation/submit_template.php');
}
	else {
		// テンプレート読み込み
		require_once(PATH.'view/consultation/template.php');
	}



?>