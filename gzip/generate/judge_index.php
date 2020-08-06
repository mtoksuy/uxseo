<?php
/**************************************************

	GZIPファイルを作成する



**************************************************/

// core読み込み
require_once('../../core.php');

// 全記事一覧データ取得
$all_article_res = Model_Article_Basis::all_article_list_get();
foreach($all_article_res as $key => $value) {
	// article_res取得
	$article_res = model_article_basis::article_get('article', $value['primary_id']);
	// article_html生成
	$article_data_array = model_article_html::article_html_create($article_res);
	// gzipファイルの中身を生成
	$gzip_article_html = model_gzip_html::gzip_article_html_create($article_data_array);
//	var_dump($gzip_article_html);

	$directory_path = PATH.'article/'.$article_data_array['article_primary_id'];
	// ディレクトリがなかった場合
	if(!file_exists($directory_path)) {
		// ディレクトリ作成
		if(mkdir($directory_path, 0755)) {
			// パーミッション変更
			chmod($directory_path, 0755);
		}
	} // if(!file_exists($directory_path)) {
	// articleファイル生成
	file_put_contents(PATH.'article/'.$article_data_array['article_primary_id'].'/index.html', $gzip_article_html);

	$file_org  = PATH.'article/'.$article_data_array['article_primary_id'].'/index.html';
	$file_gzip = $file_org.'.gz';
	// 元ファイルの内容を読み込む
	$code = file_get_contents($file_org);
	// gzip圧縮処理して同一フォルダにファイルを作成
	$gzip = gzopen($file_gzip ,'w9');
	gzwrite($gzip ,$code);
	gzclose($gzip);
}
