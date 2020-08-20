<?php 
class model_login_basis  {
	//--------
	//ログイン
	//--------
	public static function login($post) {
		$query = model_db::query("
			SELECT *
			FROM user
			WHERE uxseo_id  = '".$post["user_login"]."'
			OR    email           = '".$post["user_login"]."'");
		foreach($query as $key => $value) {
			if(password_verify($post['user_password'], $value['password'])) {
				// セッション生成
				$_SESSION["primary_id"]    = $value["primary_id"];
				$_SESSION["uxseo_id"]       = $value["uxseo_id"];
				$_SESSION["email"]            = $value["email"];
				$_SESSION["create_time"]  = $value["create_time"];
				$_SESSION["update_time"] = $value["update_time"];

				// クッキー生成(一ヶ月有効)
				setcookie('uxseo_id', $value["uxseo_id"], time() + 2592000, '/');
				setcookie('uxseo_login_key', $post['user_password'], time() + 2592000, '/');
				model_login_basis::login_history_record($_SESSION["uxseo_id"]);
				// 移動
				header('Location: '.HTTP.'seo-tool/analytics/login/admin/');
				exit;
			}
				else {
					// ログイン出来ない場合
					$lohin_message = 'ユーザー名かパスワードが間違っています。';
				}
		}
		// ログイン出来ない場合
		$lohin_message = 'ユーザー名かパスワードが間違っています。';
		return $lohin_message;
	}
	//----------------
	//クッキーログイン
	//----------------
	public static function cookie_login() {
		$login_check = false;
		$query = DB::query("
			SELECT *
			FROM user
			WHERE	judge_id     = '".$_COOKIE['judge_id']."'
			AND   password         = '".$_COOKIE['judge_login_key']."'

			OR    email            = '".$_COOKIE['judge_id']."'
			AND   password         = '".$_COOKIE['judge_login_key']."'")->execute();

		foreach($query as $key => $value) {
			// セッション生成
			$_SESSION["primary_id"]          = $value["primary_id"];
			$_SESSION["judge_id"]        = $value["judge_id"];
			$_SESSION["email"]               = $value["email"];
			$_SESSION["name"]                = $value["name"];
			$_SESSION["management_site_url"] = $value["management_site_url"];
			$_SESSION["profile_contents"]    = $value["profile_contents"];
			$_SESSION["profile_icon"]        = $value["profile_icon"];
			$_SESSION["twitter_id"]          = $value["twitter_id"];
			$_SESSION["facebook_id"]         = $value["facebook_id"];
			$_SESSION["all_page_view"]       = $value["all_page_view"];
			$_SESSION["creation_time"]       = $value["creation_time"];
			$_SESSION["update_time"]         = $value["update_time"];
			// クッキー生成(一ヶ月有効)
			setcookie('judge_id', $value["judge_id"], time() + 2592000, '/');
			setcookie('judge_login_key', $_COOKIE['judge_login_key'], time() + 2592000, '/');
			// ユーザーがログインしたらお知らせのメールを送信する
			Model_Mail_Basis::login_account_report_mail($_SESSION);
			$login_check = true;
		}
			return $login_check;
	}
	//----------------
	//ログインチェック
	//----------------
	public static function login_check() {
		// エラー表示設定()
		error_reporting(0);
		ini_set('display_errors', 1);

		$login_check = '';
		// セッションがある場合
		if($_SESSION["judge_id"]) {
			$login_check = true;
		}
			// セッションがない場合
			else {
				$login_check = false;
				// クッキーがある場合
				if($_COOKIE['judge_id']) {
					// クッキーでログイン
					$login_check  = Model_Login_Basis::cookie_login();
				}
			}
		return $login_check;
	}
	//----------
	//ログアウト
	//----------
	public static function logout() {
		// セッション削除
		$_SESSION = array();
		session_destroy();
		// クッキー削除
		setcookie('judge_id', '', time()-10000, '/');
		setcookie('judge_login_key', '',time()-10000, '/');
		header('location: '.HTTP.'');
		exit;
	}
	//----------------------
	//ログイン履歴を記録する
	//----------------------
	public static function login_history_record($uxseo_id) {
		model_db::query("
			INSERT INTO login_history (
				uxseo_id
			)
			VALUES (
				'".$uxseo_id."'
			)
		");
	}
}