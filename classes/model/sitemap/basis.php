<?php 
class model_sitemap_basis  {
	//-------------------
	//全記事リスト取得
	//-------------------
	public static function article_list_get() {
		$article_array = array();
		$article_res = model_db::query("
			SELECT *
			FROM article
			WHERE del = 0
			ORDER BY primary_id DESC");
		return $article_res;
	}

}
