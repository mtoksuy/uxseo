<?php
// core読み込み
require_once('/var/www/html/cron/uxseo_google_speed_list_core.php');


// 除外するワードクエリ取得
$not_like_query_list = model_cron_sales_basis::not_like_query_list_get();
/*
//クリーニング
$check_query = model_db::query("
	SELECT *
	FROM google_speed_list
	WHERE  primary_id > 4
	AND cron_check = 1
	AND ranking > 3
	AND ranking < 70
	AND score < 70
	AND sales_letter_check = 1
	AND title_check = 1
	AND title != ''
	AND responsive_check = 1
	AND contact_check = 0
	AND top_dmain = 1
	AND accuracy_check = 1
	AND accuracy_score >= 1
	".$not_like_query_list."
	AND prefecture = '東京'
	AND list_name LIKE '%歯医者%'
	ORDER BY primary_id ASC
");
foreach($check_query as $check_key => $check_value) {	
	$ng_array = explode(' ',$check_value['list_name']);
	$ng_title = $ng_array[0].'歯科';
	preg_match('/'.$ng_title.'/',$check_value['title'], $check_value_title_array);
	if($check_value_title_array) {
		pre_var_dump($check_value_title_array);
		$query = model_db::query("
			UPDATE google_speed_list 
			SET contact_check = 1, 
			action_type = '同地域ではない'
			WHERE primary_id = ".(int)$check_value['primary_id']."
		");
	}
}
*/
$sales_query = model_db::query("
	SELECT *
	FROM google_speed_list
	WHERE  primary_id > 4
	AND cron_check = 1
	AND ranking > 3
	AND ranking < 51
	AND score < 70
	AND sales_letter_check = 1
	AND title_check = 1
	AND title != ''
	AND responsive_check = 1
	AND contact_check = 0
	AND top_dmain = 1
	AND accuracy_check = 1
	AND accuracy_score >= 1
	".$not_like_query_list."
	AND prefecture = '神奈川'
	AND list_name LIKE '%歯医者%'
	AND del = 0
	ORDER BY primary_id ASC
	LIMIT 0,1
");


var_dump("

	SELECT *
	FROM google_speed_list
	WHERE  primary_id > 4
	AND cron_check = 1
	AND ranking > 3
	AND ranking < 51
	AND score < 70
	AND sales_letter_check = 1
	AND title_check = 1
	AND title != ''
	AND responsive_check = 1
	AND contact_check = 0
	AND top_dmain = 1
	AND accuracy_check = 1
	AND accuracy_score >= 1
	".$not_like_query_list."
	AND prefecture = '神奈川'
	AND list_name LIKE '%歯医者%'
	AND del = 0
	ORDER BY primary_id ASC
	LIMIT 0,1


");


foreach($sales_query as $key => $value) {
//	pre_var_dump($value);
	$query = model_db::query("
		UPDATE google_speed_list 
		SET contact_check = 1, 
		action_type = 'メール送信'
		WHERE primary_id = ".(int)$value['primary_id']."
	");
	$parse_url = parse_url($value['url']);
	$domain_url = preg_replace('/www./', '', $parse_url['host']);
	$mail_array = array(
		'to'            => 'info@'.$domain_url,
//		'to'            => 'entry@sharetube.jp',
		'subject'   => '【UXSEO】SEOのご提案',
		'message' => $value['sales_letter'],
	);
	// お問い合わせ内容をinfo@xxx.xxに送信する
	model_mail_basis::sales_mail($mail_array);
}
