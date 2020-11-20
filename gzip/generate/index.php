<?php
/**************************************************

	GZIPファイルを作成する



**************************************************/

// core読み込み
require_once('../../core.php');

	// 作成リスト
	$directory_array =array (
		'index', 
		'sitemap', 
		'seo-tool', 
		'media', 
		'media/article/1', 
		'media/article/2', 
		'media/article/3', 
		'media/article/4', 
		'media/article/5', 
		'media/article/6', 
	);

	// 作成
	foreach($directory_array as $key => $value) {
		// トップページの場合
		if($value == 'index') {
			// 絶対パス
			$directory_path = PATH;
			// 削除
			unlink(PATH.'index.html');
			unlink(PATH.'index.html.gz');
			// html抽出
			$gzip_article_html   = file_get_contents(HTTP);
		}
			// 複数の階層がある場合
			else if(  preg_match('/\//', $value)   ) {
				// 絶対パス
				$directory_path = PATH.$value.'/';
				unlink($directory_path.'index.html');
				unlink($directory_path.'index.html.gz');
				// html抽出
				$gzip_article_html   = file_get_contents(HTTP.$value);
			}
				// 単発ディレクトリの場合
				else {
					// 絶対パス
					$directory_path = PATH.$value.'/';
					unlink($directory_path.'index.html');
					unlink($directory_path.'index.html.gz');
					// html抽出
					$gzip_article_html   = file_get_contents(HTTP.$value);
				}
		//コメントアウトを削除 一旦外し
		$gzip_article_html = preg_replace('/<!--[\s\S]*?-->/s', '', $gzip_article_html);
		// CSSインライン化
		$gzip_article_html = model_gzip_basis::css_inline(HTTP, $gzip_article_html);
		//HTML圧縮 一旦外し
		$gzip_article_html = model_gzip_basis::html_comp($gzip_article_html);
		// htmlファイルとgzipファイルを生成
		model_gzip_basis::html_gzip_create($gzip_article_html, $directory_path);
	}

?>