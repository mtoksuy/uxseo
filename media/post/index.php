<?php
// core読み込み
require_once('/var/www/html/core.php');
	if($_SESSION['uxseo_id'] === 'mtoksuy') {
		if($_POST) {
			/**********************************************************/
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
			/**********************************************************/
			$sitemap_xml_path = PATH.'sitemap/sitemap.xml';
			// 全記事リスト取得
			$article_res = model_sitemap_basis::article_list_get();
			// sitemap.xml生成
			$sitemap_xml = model_sitemap_html::sitemap_xml_create($article_res);
			// sitemap.xmlの場所
			$sitemap_xml_path = PATH.'sitemap/sitemap.xml';
			// sitemap.xml書き込み
			file_put_contents($sitemap_xml_path, $sitemap_xml);
			/**********************************************************/
			// gzipファイル更新&作成
			exec("/usr/bin/php /var/www/html/gzip/generate/index.php > /dev/null &");
			/**********************************************************/
		}
		// テンプレート読み込み
		require_once(PATH.'view/media/post/template.php');
	}
		else {

		}
?>