<?php 
class model_mail_basis  {
	//------------------------------
	//QBメール送信(全てはここに通す)
	//------------------------------
	public static function ttt() {


}
	//------------------------------
	//QBメール送信(全てはここに通す)
	//------------------------------
	public static function qbmail_send($post_array) {
		// エラー表示設定(qbmail仕様上エラー非表示にする)
		error_reporting(0);
		ini_set('display_errors', 1);
		// qdmail呼び出し
		require_once PATH."assets/library/php/qdmail/qdmail.php";
		require_once PATH."assets/library/php/qdmail/qdsmtp.php";


//			$mail = & new Qdmail(); ??
			$mail = new Qdmail();

//			pre_var_dump($mail);
//exit;
			$mail->smtp(true);

			// param設定
			$mail -> smtpServer($post_array["param"]);
			// 送信先
			$mail ->to($post_array["to"]);
			// 題名
			$mail ->subject($post_array["subject"]);
			// 送信元情報
			$mail ->from($post_array["from"]);
			// 本文挿入
			$mail ->text($post_array["message"]);
//			$mail ->html($post_array["message"]);
			// 自動テキスト生成機能はOFF
			$mail -> autoBoth(false);

			// 送信
			$return_flag = $mail ->send();
	}
	//---------------------------------------------
	//お問い合わせ内容をinfo@spacenavi.jpに送信する
	//---------------------------------------------
	public static function contact_report_mail($mail_array) {
//	var_dump($post);

		// time関連取得
		$now_time = time();
		$now_date = date('Y-m-d H:i:s', $now_time);
		$message = ('
会社名：'.$mail_array['company_name'].'
お名前：'.$mail_array['name'].'
メールアドレス：'.$mail_array['email'].'

------------------

'.$mail_array['summary'].'');
		$post_array = array(
			'from'    => 'info@spacenavi.jp',
			'to'      => 'info@spacenavi.jp',
			'subject' => ''.$mail_array['contact_content'].'',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@spacenavi.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);





			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
}