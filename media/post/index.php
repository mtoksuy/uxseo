<?php
// core読み込み
require_once('../../core.php');
	if($_SESSION['uxseo_id'] === 'mtoksuy') {
		if($_POST) {
			// ポストの中身をエンティティ化する
			$post = library_security_basis::post_security($_POST);

			// 新規投稿
			model_media_post_basis::media_post_add($post);
			// 最新記事情報取得
			$res = model_db::query("
				SELECT *
				FROM article
				WHERE del = 0
				ORDER BY primary_id DESC
				LIMIT 0, 1");
			$directory_path = PATH.'media/article/'.(int)$res[0]['primary_id'].'';
			// ディレクトリ作成
			model_gzip_basis::dir_create($directory_path);
			// ファイル複製
			copy(PATH.'media/article/1/index.php', $directory_path.'/index.php');
			// 記事OGP画像生成
			model_media_post_basis::media_article_ogp_create($res);
		}
		// テンプレート読み込み
		require_once(PATH.'view/media/post/template.php');
	}
		else {

		}
?>