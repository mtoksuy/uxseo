<?php
// core読み込み
require_once('../../core.php');

//pre_var_dump($_POST);

if($_POST['submit']) {
	// ポストの中身をエンティティ化する
	$post = library_security_basis::post_security($_POST);
	//プランからSlackの招待するように促すレポートメール送信
	model_mail_basis::plan_slack_report_mail($post);
	// プランを選んで頂いたクライアント様へ自動メール(Slack版)
	model_mail_basis::plan_slack_automatic_mail($post);

	// テンプレート読み込み
	require_once(PATH.'view/plan/slack/template.php');
}




?>