<?php
class model_article_basis {
	//--------------
	//新着リスト取得
	//--------------
	public static function new_article_list_get($get_num = 10, $page_num = 1) {
		// 取得する場所取得
		$start_list_num = ($page_num*$get_num)-$get_num;
		$new_article_array = array();
		$new_article_res = model_db::query("
			SELECT *
			FROM article
			WHERE del = 0
			ORDER BY primary_id DESC
			LIMIT ".$start_list_num.", ".$get_num."");
		return $new_article_res;
	}
	//------------------------------
	//新着まとめページングデータ取得
	//------------------------------
	public static function new_article_paging_data_get($list_num, $paging_num) {
		// last_num取得
		$max_res = model_db::query("
			SELECT COUNT(primary_id)
			FROM article
			WHERE del = 0");
		foreach($max_res as $key => $value) {
			$last_num = (int)$value['COUNT(primary_id)'];
		}
		// 最大ページング数取得
		$max_paging_num = (int)ceil($last_num/$list_num);
		// new_article_paging_data生成
		$new_article_paging_data_array = array(
			'last_num'       => $last_num,
			'list_num'       => $list_num,
			'paging_num'     => $paging_num,
			'max_paging_num' => $max_paging_num,
		);
		return $new_article_paging_data_array;
	}
	//--------------
	//記事データ取得
	//--------------
	public static function article_get($method) {
		$article_res = model_db::query("
			SELECT * 
			FROM article 
			WHERE primary_id = ".$method."
			AND del = 0
			LIMIT 0, 1");
		return $article_res;
	}
	//----------------------------
	//前の記事、次の記事データ取得
	//----------------------------
	public static function article_previous_next_get($article_primary_id) {
		$query_p = model_db::query("SELECT * 
									FROM article
									WHERE primary_id < $article_primary_id
									AND del = 0
									ORDER BY primary_id DESC
									LIMIT 0 , 1");
		$query_n = model_db::query("SELECT * 
									FROM article
									WHERE primary_id > $article_primary_id
									AND del = 0
									ORDER BY primary_id ASC
									LIMIT 0 , 1");
		$article_previous_next_res_array = array(
		 'previous' => $query_p,
		 'next'     => $query_n,
		 );
		return $article_previous_next_res_array;
	}
	//----------
	//全記事取得
	//----------
	public static function all_article_list_get() {
		// 取得する場所取得
		$all_article_res = model_db::query("
			SELECT *
			FROM article
			WHERE del = 0
			ORDER BY primary_id DESC");
		return $all_article_res;
	}












}



