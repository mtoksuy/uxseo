<?php
class model_info_basis {
	//---------------------
	//ページングuri情報取得
	//---------------------
	public static function paging_info_get() {
		// 現在いるファイル名を取得
		$url = $_SERVER["PHP_SELF"];
		// セグメントをarrayで並べる
		$segments_array = explode("/", $url);
		// 無駄なセグメント削除
		foreach($segments_array as $key => $value) {
			if($value == '' || $value == 'judge' || $value == 'index.php') {
				// 上記の値の場合削除
				unset($segments_array[$key]);
			}
		}
		$segments_array[3] = (int)$segments_array[3];
		$paging_info_array = $segments_array;
		return $paging_info_array;
	}
	//-----------
	//Uri情報取得
	//-----------
	public static function segment_info_get() {
		$top_judgment      = FALSE;
		$category_segment  = '';
		$category_name     = '';
		$parent_name       = '';
		$parent_segment    = '';
		$paging_segment    = 0;
		$last_segument     = '';
		$segment_error     = TRUE;
		$article_judgment  = FALSE;
		$article_url_error = FALSE;
		$title_segment     = '';

		// 現在いるファイル名を取得
		$url = $_SERVER["PHP_SELF"];
		// セグメントをarrayで並べる
		$segments_array = explode("/", $url);
		// 無駄なセグメント削除
		foreach($segments_array as $key => $value) {
			if($value == '' || $value == 'judge' || $value == 'index.php') {
				// 上記の値の場合削除
				unset($segments_array[$key]);
			}
		}
		// arrayを詰める
		$segments_array = array_merge($segments_array);
		// arrayの順番を逆にする
		// $segments = array_reverse($segments_array);

		// トップページ判定
		if($segments_array == array()) {
			$top_judgment = TRUE;
		}
		//---------------------
		// セグメントを走査する
		//---------------------
		foreach($segments_array as $key => $value) {
			//------------
			//記事判定取得
			//------------
			if(preg_match('/^[0-9]+$/', $value, $article_preg_array)) {
//			var_dump($article_preg_array);
//			var_dump($value);

				$query = model_db::query("
					SELECT COUNT(link)
					FROM article
					WHERE link = '".$value."'
					AND del    = 0
					LIMIT 0, 1");
				foreach($query as $key_1 => $value_1) {
					// 公開している記事である
					if((int)$value_1["COUNT(link)"] === 1) {
						$article_judgment  = TRUE;
						$article_url_error = TRUE;
					}
						// 公開している記事ではない
						else {
							$article_judgment  = TRUE;
							$article_url_error = FALSE;
						}
				} // foreach($query as $key_1 => $value_1) {
			} // if(preg_match('((^[0-9]{0,4})(-|_)([0-9]{0,2})(-|_)([0-9]{0,2})(-|_)(.*))', $value, $article_preg_array)) {
				//--------------
				//ページング判定
				//--------------
				else if(preg_match('/(^[0-9]+?$)/', $value, $paging_preg_array)) {
//					var_dump($paging_preg_array);
//					print "ページング";
					$paging_segment = (int)$value;
				}
					//----------------
					//記事ではない場合
					//----------------
					else {
						// セグメント情報取得
						$query_count = model_db::query("
							SELECT COUNT(*)
							FROM category_segment 
							WHERE category_segment = '".$value."'");
						//--------------
						//セグメント確認
						//--------------
						foreach($query_count as $key_2 => $value_2) {
							// セグメントあり
							if($value_2["COUNT(*)"]) {
								$last_segument   = $value;
							}
								// セグメントなし
								else {
									$segment_error = FALSE;
								}
						}
					} // 記事ではない場合 else {
		} // foreach($segments_array as $key => $value) {
//		var_dump($last_segument);
//		echo $last_segument;
//		echo $paging_segment;

		// セグメント情報取得
		$query = model_db::query("
			SELECT * 
			FROM category_segment 
			WHERE category_segment = '".$last_segument."'");
		foreach($query as $key => $value) {
//			var_dump($value);
			$category_name    = $value["category_name"];
			$category_segment = $value["category_segment"];
			$parent_name      = $value["parent_name"];
			$parent_segment   = $value["parent_segment"];
		}
//		var_dump($parent_name);
		// タイトルセグメント取得
		if($paging_segment) {
			$title_segment .= $paging_segment." | ";	
		}
		if($category_name) {
			$title_segment .= $category_name." | ";
		}
		if($parent_name) {
			$title_segment .= $parent_name." | ";
		}
//		var_dump($title_segment);


		$segment_info_get_array = array(
			'top_judgment'         => $top_judgment,      // 
			'segment'              => $category_segment,  // 
			'segment_error'        => $segment_error,     // 
			'category_name'        => $category_name,     // 
			'category_segment'     => $category_segment,  // 
			'parent_name'          => $parent_name,       // 
			'parent_segment'       => $parent_segment,    // 
			'paging_segment'       => $paging_segment,    // 
			'article_judgment'     => $article_judgment,  // 
			'article_url_error'    => $article_url_error, // 
			'title_segment'        => $title_segment,     //
		);
		return $segment_info_get_array;
	}
	//-------------------------
	//judgeのユーザーデータ取得
	//-------------------------
	public static function judge_user_data_get($judge_id, $cached = 900) {
		$judge_user_data_array  = array();
		$judge_user_data_res = model_db::query("
			SELECT *
			FROM user 
			WHERE judge_id = '".$judge_id."'");
		foreach($judge_user_data_res as $key => $value) {
			$judge_user_data_array["primary_id"]          = $value["primary_id"];
			$judge_user_data_array["judge_id"]        = $value["judge_id"];
			$judge_user_data_array["name"]                = $value["name"];
			$judge_user_data_array["email"]               = $value["email"];
			$judge_user_data_array["url"]                 = $value["url"];
			$judge_user_data_array["management_site_url"] = $value["management_site_url"];
			$judge_user_data_array["profile_contents"]    = $value["profile_contents"];
			$judge_user_data_array["profile_icon"]        = $value["profile_icon"];
			$judge_user_data_array["profile_html"]        = $value["profile_html"];
			$judge_user_data_array["twitter_id"]          = $value["twitter_id"];
			$judge_user_data_array["facebook_id"]         = $value["facebook_id"];
			$judge_user_data_array["pay_pv"]              = (int)$value["pay_pv"];
			$judge_user_data_array["all_page_view"]       = (int)$value["all_page_view"];
			$judge_user_data_array["bank_name"]           = $value["bank_name"];
			$judge_user_data_array["account_holder"]      = $value["account_holder"];
			$judge_user_data_array["account_type"]        = $value["account_type"];
			$judge_user_data_array["branch_code"]         = $value["branch_code"];
			$judge_user_data_array["account_number"]      = $value["account_number"];
			$judge_user_data_array["mail_delivery_ok"]    = $value["mail_delivery_ok"];
		}
		return $judge_user_data_array;
	}
	//----------------------
	// 現在のurlのパース取得
	//----------------------
	public static function url_parse_get() {
		$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		//URLデコードを行う
		$srt=urldecode($url);//urlエンコードされている場合に元に戻す（?が&amp;になっている時など）
		$keys = parse_url($url); //パース処理
		$url_path = explode("/", $keys['path']); //分割処理
		//$last = end($url_path); //最後の要素を取得
		return $url_path;
	}
	//------------------
	// 記事urlからid取得
	//------------------
	public static function url_article_id__get() {
		$url = (empty($_SERVER['HTTPS']) ? 'http://' : 'https://') . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		//URLデコードを行う
		$srt=urldecode($url);//urlエンコードされている場合に元に戻す（?が&amp;になっている時など）
		$keys = parse_url($url); //パース処理
		preg_match('/[0-9]+/', $keys['path'], $array);
		return (int)$array[0];
	}

























}
