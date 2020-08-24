<?php
/*
* Ajax パスワードをリアルタイムでチェック コントローラー
* 
* 
* 
*/

// core読み込み
require_once('../../../../core.php');
// ポストの中身をエンティティ化する
$post = library_security_basis::post_security();
// 新規登録uxseo_idチェック
$user_password_check = model_signup_basis::password_check($post);
// データセット
$json_data = array(
	'post11'           => $_POST,
	'post'           => $post,
	'password'           => $post['password'],
	'password_check' => $user_password_check,
);
echo json_encode($json_data);







?>