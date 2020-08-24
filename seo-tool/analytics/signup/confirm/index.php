<?php
// core読み込み
require_once('../../../../core.php');

if($_GET) {
	// 現在の時間から30分前のdate取得
	$now_time                   = time();
	$minutes_ago_30_date = date('Y-m-d H:i:s', $now_time-60*30);
	$minutes_ago_30_time = strtotime($minutes_ago_30_date);
	$hash = $_GET['hash'];

	// ユーザー仮登録情報取得
	$signup_confirm_res = model_signup_basis::user_signup_confirm_get($hash);
	if($signup_confirm_res) {
		// 残り時間
		$remaining_time = (int)strtotime($signup_confirm_res[0]['create_time'])-$minutes_ago_30_time;
		// 既に本登録してる方
		if((int)$signup_confirm_res[0]['signup_check'] === 1) {
			$title = '既に本登録されてます';
			$text = 'ログインしてUXSEOアナリティクスを利用してSEO活用しましょう。';
			$link = '	<div class="registration_button o_8 clearfix">
				<a href="'.HTTP.'seo-tool/analytics/login/" target="_blank">ログインページに行く</a>
			</div>';
			// テンプレート読み込み
			require_once(PATH.'view/seo-tool/analytics/signup/confirm/check_template.php');
		}
			// 30分の制限時間を超えてしまってるURL
			else if($remaining_time < 1) {
				$title = '30分を超えています';
				$text = '再度新規登録を行って下さい。';
			$link = '	<a href="'.HTTP.'seo-tool/analytics/signup/">はじめるに行く</a>';
				// テンプレート読み込み
				require_once(PATH.'view/seo-tool/analytics/signup/confirm/check_template.php');
			}
				// まだ本登録してない方
				else if((int)$signup_confirm_res[0]['signup_check'] === 0) {
				// ユーザー本登録
				$signup_confirm_res = model_signup_basis::user_signup_main($signup_confirm_res);
				// テンプレート読み込み
				require_once(PATH.'view/seo-tool/analytics/signup/confirm/template.php');
				}
	}
		else {
			// やばいやつ
			echo '不正が確認されました';
		}
}




?>