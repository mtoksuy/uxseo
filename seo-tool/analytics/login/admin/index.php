<?php
// core読み込み
require_once('../../../../core.php');
	if($_SESSION) {
//		$now_directory_name = 'ホーム';
	// アナリティクスチケット取得
	$analytics_ticket_res = model_analytics_basis::analytics_ticket_get();




/*
$keyword = ['UXSEO', 'Aダッシュ'];
$rank = ['1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26', '27', '28', '29', '30', '31', '32', '33', '34', '35', '36', '37', '38', '39', '40', '41', '42', '43', '44', '45', '46', '47', '48', '49', '50', '51', '52', '53', '54', '55', '56', '57', '58', '59', '60', '61', '62', '63', '64', '65', '66', '67', '68', '69', '70', '71', '72', '73', '74', '75', '76', '77', '78', '79', '80', '81', '82', '83', '84', '85', '86', '87', '88', '89', '90', '91', '92', '93', '94', '95', '96', '97', '98', '99','100'];


		$now_time = time();
		 $day_1     = ((60*60)*24); // 1日
		 $year_1    = $day_1*3650;
		 $test_time = $now_time-$year_1; // 1年前設定

for($a = 0; $a < 3650; $a++) {
	foreach($keyword as $key => $value) {
		$rank_key      = array_rand($rank);
		$json_data     = json_encode(["https://uxseo.jp/",$value, $rank_key.'位'], JSON_UNESCAPED_UNICODE);
		$test_date     = date('Y-m-d H:i:s', $test_time);

		$analytics_ticket_res = model_db::query("
			INSERT INTO googler_query (
				analytics_ticket_primary_id, 
				uxseo_id, 
				url, 
				query, 
				rank, 
				query_json, 
				test_time
			) 
			VALUES (
				12,
				'mtoksuy',
				'https://uxseo.jp/',
				'".$value."',
				'".$rank_key."位',
				'".$json_data."', 
				'".$test_date."'
			)
			");
	}
//	pre_var_dump($keyword[$keyword_key]);
//	pre_var_dump((int)$rank[$rank_key]);
// pre_var_dump($test_date);
	$test_time=$test_time+$day_1;
}
*/



	// テンプレート読み込み
	require_once(PATH.'view/seo-tool/analytics/login/admin/template.php');
	}
		else {
			// あとでクッキーらへんでログイン記述
		}
?>