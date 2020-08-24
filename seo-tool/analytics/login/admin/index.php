<?php
// core読み込み
require_once('../../../../core.php');
	if($_SESSION) {
// テスト書き込み
/*
$keyword = ['UXSEO', 'Aダッシュ'];
$keyword = ['ななちょ', 'Bダッシュ'];
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
				13,
				'mtoksuy',
				'http://programmerbox.com/',
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


	// アナリティクスチケット取得
	$analytics_ticket_res = model_analytics_basis::analytics_ticket_get();
	// 最新turn_idアナリティクスチケット取得
	$analytics_ticket_new_turn_id_res = model_analytics_basis::analytics_ticket_new_turn_id_get();
	//////////////////////
	// チケット登録あれば
	//////////////////////
	if($analytics_ticket_new_turn_id_res) {
		//////////////////
		// デフォルト設定
		/////////////////
		foreach($analytics_ticket_new_turn_id_res as $key => $value) {
			$ticket_turn_id = $value['turn_id'];
		}
		$term = 7;
		$term_title_name = '過去7日間';
		if($_GET['turn_id']) {
			$ticket_turn_id = $_GET['turn_id'];
		}
		if($_GET['term']) {
			$term              = (int)$_GET['term'];
			switch($term) {
				case 7:
					$term_title_name = '過去7日間';
				break;
				case 30:
					$term_title_name = '過去1ヶ月間';
				break;
				case 90:
					$term_title_name = '過去3ヶ月間';
				break;
				case 180:
					$term_title_name = '過去半年間';
				break;
				case 365:
					$term_title_name = '過去1年間';
				break;
				default;
					$term_title_name = 'カスタム';
				break;
			}
		}
		$now_time =time();
		$default_time = $now_time-((60*60)*24)*$term;
		$default_date = date('Y-m-d H:i:s', $default_time); // 表示期間
		// アナリティクスグラフデータ取得
		list($analytics_graph_data, $analytics_graph_url_data) = model_analytics_basis::analytics_graph_data_get($ticket_turn_id, $default_date);

		// アナリティクスプロパディリストHTML生成
		$analytics_propaddy_list_html = model_analytics_html::analytics_propaddy_html_list_get($analytics_ticket_res);
		// アナリティクスグラフURLリスト取得
		$analytics_url_list_res = model_analytics_basis::analytics_url_list_get();
		// テンプレート読み込み
		require_once(PATH.'view/seo-tool/analytics/login/admin/template.php');
	} // if($analytics_ticket_new_turn_id_res) {
		// チケットない人用
		else {
		// テンプレート読み込み
		require_once(PATH.'view/seo-tool/analytics/login/admin/first_template.php');
		}
} // if($_SESSION) {
	else {
		// あとでクッキーらへんでログイン記述
	}
?>