<?php 
class model_analytics_basis  {
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
			SELECT turn_id
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
	}
	//-----------------------------
	//アナリティクスチケット取得
	//-----------------------------
	public static function analytics_ticket_get() {
		$analytics_ticket_res = model_db::query("
			SELECT * 
			FROM analytics_ticket
			WHERE uxseo_id = '".$_SESSION['uxseo_id']."' 
			ORDER BY turn_id ASC
			");
		return $analytics_ticket_res;
	}











}