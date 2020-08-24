<?php
/*
* Ajax uxseo_idをリアルタイムでチェック コントローラー
* 
* 
* 
*/

// core読み込み
require_once('../../../../core.php');
// ポストの中身をエンティティ化する
$post = library_security_basis::post_security();
// 新規登録uxseo_idチェック
$user_uxseo_id_check = model_signup_basis::uxseo_id_check($post);
// データセット
$json_data = array(
	'uxseo_id'           => $post['uxseo_id'],
	'uxseo_id_check' => $user_uxseo_id_check,
);
echo json_encode($json_data);








?>