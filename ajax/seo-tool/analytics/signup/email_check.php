<?php
/*
* Ajax メールアドレスをリアルタイムでチェック コントローラー
* 
* 
* 
*/

// core読み込み
require_once('../../../../core.php');
// ポストの中身をエンティティ化する
$post = library_security_basis::post_security();
// 新規登録uxseo_idチェック
$user_email_check = model_signup_basis::email_check($post);
// データセット
$json_data = array(
	'email'           => $post['email'],
	'email_check' => $user_email_check,
);
echo json_encode($json_data);







?>