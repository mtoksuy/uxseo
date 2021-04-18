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
		require_once "/var/www/html/assets/library/php/qdmail/qdmail.php";
		require_once "/var/www/html/assets/library/php/qdmail/qdsmtp.php";
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
	//お問い合わせ内容をinfo@uxseo.jpに送信する
	//---------------------------------------------
	public static function contact_report_mail($mail_array) {
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
			'from'    => 'info@uxseo.jp',
			'to'      => 'info@uxseo.jp',
			'subject' => ''.$mail_array['contact_content'].'',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//-----------------------------------------------------------
	//プランからSlackの招待するように促すレポートメール送信
	//------------------------------------------------------------
	public static function plan_slack_report_mail($mail_array) {
		// time関連取得
		$now_time = time();
		$now_date = date('Y-m-d H:i:s', $now_time);
		$message = ('
プラン：'.$mail_array['plan'].'
メールアドレス：'.$mail_array['email_1'].'

早急にSlackへ招待する

');
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => 'info@uxseo.jp',
			'subject' => '[重要]プランから申し込み - Slackへ招待',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//-------------------------------------------------------------
	//プランを選んで頂いたクライアント様へ自動メール(Slack版)
	//-------------------------------------------------------------
	public static function plan_slack_automatic_mail($mail_array) {
		$message = ('
プラン：'.$mail_array['plan'].' を選んで頂きありがとうございます。只今、担当者からSlackの招待を送りますのでお待ち頂けるようお願い致します。

-------

UXSEO [1億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/

[運営会社]
スペースナビ株式会社
https://spacenavi.jp/');

 
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => $mail_array['email_1'],
			'subject' => 'UXSEOへ申し込みありがとうございます',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//-------------------------------------------
	//プラン-お問い合わせのレポートメール送信
	//-------------------------------------------
	public static function plan_contact_report_mail($mail_array) {
		// time関連取得
		$now_time = time();
		$now_date = date('Y-m-d H:i:s', $now_time);
		$message = ('
[基本クライアント情報]
プラン名
'.$mail_array['plan'].'

貴社名
'.$mail_array['company_name'].'

担当者名
'.$mail_array['name'].'

メールアドレス
'.$mail_array['email'].'

対象サイトURL
'.$mail_array['url'].'

お問い合わせ内容詳細
'.$mail_array['summary'].'

-------

早急に対応');
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => 'info@uxseo.jp',
			'subject' => '[重要]プラン-お問い合わせから申し込み',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//--------------------------------------------------------------------
	//プランを選んで頂いたクライアント様へ自動メール(お問い合わせ版)
	//---------------------------------------------------------------------
	public static function plan_contact_automatic_mail($mail_array) {
		$message = ('
プラン：'.$mail_array['plan'].' を選んで頂きありがとうございます。只今、担当者からご連絡を致しますのでお待ち頂けるようお願い致します。

[ご記入して頂いた情報]
プラン名
'.$mail_array['plan'].'

貴社名
'.$mail_array['company_name'].'

担当者名
'.$mail_array['name'].'

メールアドレス
'.$mail_array['email'].'

対象サイトURL
'.$mail_array['url'].'

お問い合わせ内容詳細
'.$mail_array['summary'].'

-------

UXSEO [1億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/

[運営会社]
スペースナビ株式会社
https://spacenavi.jp/');

 
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => $mail_array['email'],
			'subject' => 'UXSEOへ申し込みありがとうございます',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//--------------------------------
	// SEOの相談レポートメール送信
	//--------------------------------
	public static function consultation_report_mail($mail_array) {
		// time関連取得
		$now_time = time();
		$now_date = date('Y-m-d H:i:s', $now_time);
		$message = ('
メールアドレス
'.$mail_array['email'].'

-------

早急にSlackに招待する');
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => 'info@uxseo.jp',
			'subject' => '[重要]SEOの相談  - Slackへ招待',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//-----------------------------------------
	//SEOの相談 クライアント様へ自動メール
	//------------------------------------------
	public static function consultation_automatic_mail($mail_array) {
		$message = ('
SEOの相談承りました。只今、担当の者がSlackの招待を送りますのでよろしくお願い致します。

-------

UXSEO [1億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/

[運営会社]
スペースナビ株式会社
https://spacenavi.jp/');
 
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => $mail_array['email'],
			'subject' => 'UXSEOへSEOの相談ありがとうございます',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//-------------------------------------------------
	//新規登録のメールアドレスへ仮登録メールを送る
	//-------------------------------------------------
	public static function user_signup_confirm_mail($mail_array, $hash) {
		$message = ('
UXSEOアナリティクスの仮登録ありがとうございます。

以下のURLを30分以内にクリックすると、本登録が完了します。
https://uxseo.jp/seo-tool/analytics/signup/confirm/?hash='.$hash.'

※このURLをクリックしていただかないと、本登録が完了しません。必ずこのURLをクリックしてお進みください。

-------

UXSEO [1億PVから研究した'.date('Y').'年最新のSEO決定版サービス]
https://uxseo.jp/

[運営会社]
スペースナビ株式会社
https://spacenavi.jp/');
 
		$post_array = array(
			'from'    => 'info@uxseo.jp',
			'to'      => $mail_array['email'],
			'subject' => '[UXSEOアナリティクス]本登録のご案内',
			'message' => $message,
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'info@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
			// qbメール送信
			Model_Mail_Basis::qbmail_send($post_array);
	}
	//----------------
	//営業メール送信
	//----------------
	public static function sales_mail($mail_array) { 
		$post_array = array(
			'from'    => '松岡 宗谷｜UXSEO <souya_matsuoka@uxseo.jp>',
			'to'      => $mail_array['to'],
			'subject' => $mail_array['subject'],
			'message' => $mail_array['message'],
			'param'   => array(
				'host'     => 'localhost',
				'port'     => 25,
				'from'     => 'souya_matsuoka@uxseo.jp', 
				'protocol' => 'SMTP',
				'user'     => '',
				'pass'     => '',),
		);
		// qbメール送信
		Model_Mail_Basis::qbmail_send($post_array);
	}








}