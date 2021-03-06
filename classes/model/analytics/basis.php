<?php 
class model_analytics_basis  {
	//---------------------------------------------------------
	//133.130.116.136でGooglerを回してjsonでデータ取得
	//---------------------------------------------------------
	public static function analytics_googler_json_data_get($post) {
		if(!$post['analytics_ticket_primary_id']) { $post['analytics_ticket_primary_id'] = 'false'; }
		if($_SESSION) { $post['uxseo_id'] = $_SESSION['uxseo_id']; }
		if(!$_SESSION) { $post['uxseo_id'] = 'false'; }
		$json = file_get_contents('http://133.130.116.136/?url='.preg_replace('/\//', 'すらっしゅ', $post['url']).
			'&keyword_1='.preg_replace('/ /', 'げろげろ空白', $post['keyword_1']).
			'&keyword_2='.preg_replace('/ /', 'げろげろ空白', $post['keyword_2']).
			'&keyword_3='.preg_replace('/ /', 'げろげろ空白', $post['keyword_3']).
			'&analytics_ticket_primary_id='.$post['analytics_ticket_primary_id'].
			'&uxseo_id='.$post['uxseo_id'].
		'');
		$json_array_data = json_decode($json);
		return $json_array_data;
	}
	//-----------------------------
	//アナリティクスチケット登録
	//-----------------------------
	public static function analytics_ticket_add($post) {
		$array = array();
		if($post['keyword_1']) {
			$array[] = $post['keyword_1'];
		}
		if($post['keyword_2']) {
			$array[] = $post['keyword_2'];
		}
		if($post['keyword_3']) {
			$array[] = $post['keyword_3'];
		}
		$keyword_json = json_encode($array, JSON_UNESCAPED_UNICODE);
		$analytics_ticket_query = model_db::query("
			SELECT *
			FROM analytics_ticket 
			WHERE uxseo_id = '".$_SESSION['uxseo_id']."' 
			ORDER BY turn_id DESC
			LIMIT 0, 1
			");
			if($analytics_ticket_query) {
				$turn_id = (int)$analytics_ticket_query[0]['turn_id'];
				$turn_id++;
			}
				else {
					$turn_id = 1;
				}
		$query = model_db::query("
			INSERT INTO analytics_ticket (
				uxseo_id,
				url, 
				keyword_json, 
				turn_id
			)
			VALUES (
				'".$_SESSION['uxseo_id']."',
				'".$post['url']."',
				'".$keyword_json."',
				".$turn_id."
			)");
		$analytics_ticket_query = model_db::query("
			SELECT *
			FROM analytics_ticket 
			WHERE uxseo_id = '".$_SESSION['uxseo_id']."' 
			ORDER BY turn_id DESC
			LIMIT 0, 1
			");
		 $analytics_ticket_primary_id = (int)$analytics_ticket_query[0]['primary_id'];
		return $analytics_ticket_primary_id;
	}
	//------------------------------------------
	//最新turn_idアナリティクスチケット取得
	//------------------------------------------
	public static function analytics_ticket_new_turn_id_get() {
		$analytics_ticket_new_turn_id_res = model_db::query("
			SELECT * 
			FROM analytics_ticket
			WHERE uxseo_id = '".$_SESSION['uxseo_id']."' 
			AND del = 0
			ORDER BY turn_id ASC
			LIMIT 0, 1
			");
		return $analytics_ticket_new_turn_id_res;
	}
	//-----------------------------
	//アナリティクスチケット取得
	//-----------------------------
	public static function analytics_ticket_get() {
		$analytics_ticket_res = model_db::query("
			SELECT * 
			FROM analytics_ticket
			WHERE uxseo_id = '".$_SESSION['uxseo_id']."' 
			AND del = 0
			ORDER BY turn_id ASC
			");
		return $analytics_ticket_res;
	}
	//----------------------------------
	// アナリティクスグラフデータ取得
	//----------------------------------
	public static function analytics_graph_data_get($ticket_turn_id = 1, $drawing_time = '2020-08-21 00:00:00') {
		$analytics_ticket_res = model_db::query("
			SELECT *
			FROM analytics_ticket
				WHERE uxseo_id	 = '".$_SESSION['uxseo_id']."'
				AND turn_id = ".$ticket_turn_id."
				AND del = 0
				ORDER BY turn_id ASC
			");
// 登録されているチケットを回す
foreach($analytics_ticket_res as $key => $value) {
	foreach(json_decode($value['keyword_json']) as $keyword_json_key => $keyword_json_value) {
		$googler_query_res = model_db::query("
			SELECT *
			FROM googler_query
				WHERE analytics_ticket_primary_id	 = ".$value['primary_id']."
				AND query = '".$keyword_json_value."'
				AND create_time > '".$drawing_time."'
				ORDER BY primary_id ASC
			");
		foreach($googler_query_res as $googler_query_key => $googler_query_value) {
			$query[]          = $googler_query_value['query'];
			$unixtime = strtotime($googler_query_value['create_time']);
			$create_time[] = date('Y/m/d', $unixtime);
			$rank[]            = (int)preg_replace('/位/', '',  $googler_query_value['rank']);
			if($keyword_json_key === 0) {
				if($googler_query_key === 0) {
					$backgroundColor .="'rgba(54, 162, 235, 0)',
";
					$borderColor .="'rgba(54, 162, 235, 1)',
";
				}
					$backgroundColor .="'rgba(54, 162, 235, 1)',
";
					$borderColor .="'rgba(54, 162, 235, 1)',
";
			}
				else if($keyword_json_key === 1) {
					if($googler_query_key === 0) {
						$backgroundColor .="'rgba(39, 170, 99, 0)',
";
						$borderColor .="'rgba(39, 170, 99, 1)',
";
					}
					$backgroundColor .="'rgba(39, 170, 99, 1)',
";
					$borderColor .="'rgba(39, 170, 99, 1)',
";
				}
					else if($keyword_json_key === 2) {
						if($googler_query_key === 0) {
							$backgroundColor .="'rgba(255, 177, 69, 0)',
";
							$borderColor .="'rgba(255, 177, 69, 1)',
";
						}
						$backgroundColor .="'rgba(255, 177, 69, 0)',
";
						$borderColor .="'rgba(255, 177, 69, 1)',
";
					}
		}
			$query_json_data              = json_encode($query, JSON_UNESCAPED_UNICODE);
			$create_time_json_data     = json_encode($create_time, JSON_UNESCAPED_UNICODE);
			$rank_json_data                = json_encode($rank, JSON_UNESCAPED_UNICODE);

$analytics_graph_data.= "
			{
	            label: '".$keyword_json_value."',
	            data: ".$rank_json_data.",
				order:1,
	            backgroundColor: [
					".$backgroundColor."
	            ],
	            borderColor: [
					".$borderColor."
	            ],
	            borderWidth: 3,
				tension: 0.3,
				pointRadius: 0,
				pointStyle: 'circle',
	        },";
// 初期化
$query = array();
$create_time = array();
$rank = array();
$color = '';
$backgroundColor = '';
$borderColor = '';
	}
}
	// シングルクウォートに変換
	$create_time_json_data            = preg_replace('/"/', "'",  $create_time_json_data);
	// グラフデータ合体
    $analytics_graph_data="
data: {
        labels: ".$create_time_json_data.",
        datasets: [
		".$analytics_graph_data."
	]
},";
		return [$analytics_graph_data, $analytics_ticket_res[0]['url']];
	}
	//---------------------------------------
	// アナリティクスグラフURLリスト取得
	//---------------------------------------
	public static function analytics_url_list_get() {
		$analytics_url_list_res = model_db::query("
			SELECT *
			FROM analytics_ticket
				WHERE uxseo_id	 = '".$_SESSION['uxseo_id']."'
				AND del = 0
				ORDER BY turn_id ASC
			");
		return $analytics_url_list_res;
	}
	//---------------------
	//analytics_ticket削除
	//---------------------
	public static function analytics_ticket_delete($turn_id) {
		$query = model_db::query("
			UPDATE analytics_ticket 
				SET del = 1 
				WHERE uxseo_id = '".$_SESSION['uxseo_id']."'
				AND turn_id = ".$turn_id."");
	}



























}