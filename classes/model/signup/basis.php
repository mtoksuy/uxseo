<?php 
class model_signup_basis  {
	//----------------------------
	//新規登録uxseo_idチェック
	//----------------------------
	public static function uxseo_id_check($post) {
		// チェック変数
		$user_uxseo_id_check = true;
		// 半角英数字(-_含む)だけか調べる
		$pattern = '/^[a-zA-Z0-9_-]+$/';
		if(preg_match($pattern, $post["uxseo_id"], $uxseo_id_array)) {
			// idかぶってないかチェック
			if($uxseo_id_array[0] != 'UXSEO' && $uxseo_id_array[0] != 'uxseo') {
				$signup_uxseo_id_res = model_db::query("
					SELECT *
					FROM user
					WHERE uxseo_id = '".$post["uxseo_id"]."'");	
					foreach($signup_uxseo_id_res as $key => $value) {
						$user_uxseo_id_check = false;
					}
			}
			// サイト名は弾く
				else {
					$user_uxseo_id_check = false;
				}
		}
			else {
				$user_uxseo_id_check = false;
			}
		return $user_uxseo_id_check;
	}
	//----------------------------
	//メールアドレスをチェックする
	//----------------------------
	public static function email_check($post) {
		// チェック変数
		$user_email_check = true;
		// 正しいメールアドレスかどうか調べる関数
		$user_email_check = library_validateemail_basis::validate_email($post["email"]);
		if($user_email_check) {
			$signup_email_res = model_db::query("
				SELECT *
				FROM user
				WHERE email = '".$post["email"]."'");
			foreach($signup_email_res as $key => $value) {
				$user_email_check = false;
			}
		}
			else {
				$user_email_check = false;
			}
		return $user_email_check;
	}
	//---------------------------
	//パスワードをチェックする
	//---------------------------
	public static function password_check($post) {
		// チェック変数
		$user_password_check = true;
		// 半角英数字だけか調べる
		$pattern = '/^[a-zA-Z0-9_-]+$/';
		if(preg_match($pattern, $post["password"], $password_array)) {
			$password_number = strlen($post["password"]);
			// 4文字未満ならアウト
			if($password_number < 4) {
					$user_password_check = false;
			}
		}
			// 半角英数字以外が入っている場合
			else {
				$user_password_check = false;
			}
		return $user_password_check;
	}

	//----------------
	//ユーザー仮登録
	//----------------
	public static function user_signup_confirm($post) {
		// hash生成
		$password_hash = password_hash($post['password'], PASSWORD_DEFAULT);

		$now_time          = time();
		$now_date          = date('Y-m-d', $now_time);
		$create_date       = date('Y-m-d H:i:s', $now_time);
		$article_year_time = date('Y', $now_time);

		// 期限付きURLに付けるハッシュ取得
		exec('mkpasswd -l 32 -d 9 -C 5 -s 0 -2', $exec_array);
				// ユーザー仮登録
				model_db::query("
					INSERT INTO signup_confirm (
						uxseo_id,
						email, 
						password,
						confirm_hash
					)
					VALUES (
						'".$post['uxseo_id']."',
						'".$post['email']."',
						'".$password_hash."',
						'".$exec_array[0]."'
					)");
			// 新規登録のメールアドレスへ仮登録メールを送る
			model_mail_basis::user_signup_confirm_mail($post, $exec_array[0]);

			// パスワードを●に変換する
//			$password_hidden_string = model_signup_basis::password_hidden_string($post);
			// ユーザー登録された主旨のレポートメールを受け取る
//			model_mail_basis::new_account_report_mail($post, $password_hidden_string);
	}
	//-------------------------
	//ユーザー仮登録情報取得
	//-------------------------
	public static function user_signup_confirm_get($hash) {
		// 現在の時間から30分前のdate取得
		$now_time                   = time();
		$minutes_ago_30_date = date('Y-m-d H:i:s', $now_time-60*30);

		// ユーザー仮登録情報検索
		  $signup_confirm_res = model_db::query("
			SELECT * 
			FROM signup_confirm 
			WHERE confirm_hash = '".$hash."'");
		return $signup_confirm_res;
	}
	//----------------
	//ユーザー本登録
	//----------------
	public static function user_signup_main($signup_confirm_res) {
		$now_time = time();
		$now_date = date('Y-m-d H:i:s', $now_time);
		// 更新
		 model_db::query("
			UPDATE signup_confirm 
			SET signup_check = 1 
			WHERE primary_id =  ".(int)$signup_confirm_res[0]['primary_id']."");
		// 本登録
		model_db::query("
			INSERT INTO user (
				uxseo_id, 
				email, 
				password,
				update_time
			)
		VALUES (
			'".$signup_confirm_res[0]['uxseo_id']."',
			'".$signup_confirm_res[0]['email']."',
			'".$signup_confirm_res[0]['password']."',
			'".$now_date."'
		)");
		return $signup_confirm_res;
	}
	//------------------------
	//パスワードを●に変換する
	//------------------------
	public static function password_hidden_string($post) {
		// 何文字あるか取得
		$password_num = strlen($post["password"]);
		// リターンする変数
		$password_hidden_string = '';
		// パスワードを●に変換する
		for($i = 0; $i < $password_num; $i++) {
			$password_hidden_string .= '●';
		}
		return $password_hidden_string;
	}






	//------------
	//ユーザー登録
	//------------
	public static function user_signup($post) {
				$now_time          = time();
				$now_date          = date('Y-m-d', $now_time);
				$create_date       = date('Y-m-d H:i:s', $now_time);
				$article_year_time = date('Y', $now_time);
//				echo md5($post["password"]);

				// ユーザー登録
				model_db::query("
					INSERT INTO user (
					uxseo_id ,
					email, 
					password ,
					name, 
					update_time)
					VALUES (
					'".$post["uxseo_id"]."', 
					'".$post["email"]."', 
					'".md5($post["password"])."', 
					'".$post["uxseo_id"]."', 
					'".$create_date."')");

			// パスワードを●に変換する
			$password_hidden_string = model_signup_basis::password_hidden_string($post);
			// ユーザーへ登録完了メール送信
			model_mail_masis::new_account_contact_mail($post, $password_hidden_string);
			// ユーザー登録された主旨のレポートメールを受け取る
			model_mail_basis::new_account_report_mail($post, $password_hidden_string);
	}
}
