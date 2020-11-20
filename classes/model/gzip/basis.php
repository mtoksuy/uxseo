<?php
class model_gzip_basis {
	//----
	//削除
	//----
	/**
	* 再帰的にディレクトリを削除する。
	* @param string $dir ディレクトリ名（フルパス）
	*/
	 public static function removeDir($dir) {
	    $cnt = 0;
	    $handle = opendir($dir);
	
	    if (!$handle) {
	        return ;
	    }
	    while (false !== ($item = readdir($handle))) {
	        if ($item === "." || $item === "..") {
	            continue;
	        }
	        $path = $dir . DIRECTORY_SEPARATOR . $item;
	        if (is_dir($path)) {
	            // 再帰的に削除
	            $cnt = $cnt + removeDir($path);
	        }
	        else {
	            // ファイルを削除
	            unlink($path);
	        }
	    }
	    closedir($handle);
	
	    // ディレクトリを削除
	    if (!rmdir($dir)) {
	        return ;
	    }
	}
	//-------------------
	// CSSインライン化
	//-------------------
	 public static function css_inline($http, $gzip_article_html) {
		$search = '/<link(.*)rel=(("|\')stylesheet("|\'))(.*)>/';
		preg_match_all($search, $gzip_article_html, $gzip_article_html_array);
		foreach($gzip_article_html_array[0] as $key => $value) {
			$search = '/href=("|\')(.*?)("|\')/';
			 preg_match($search, $value, $value_array);
			 if(preg_match('/http|https/' ,$value_array[2])) {
				$css = file_get_contents($value_array[2]);
			}
				else {
					$css = file_get_contents($http.$value_array[2]);
				}
			$css = preg_replace('/
|	/', '', $css);
			$search = $gzip_article_html_array[0][$key];
			$replace = '<style>'.$css.'</style>';
			$search = preg_replace('/\?/', '\?', $search);
			$gzip_article_html = preg_replace('#'.$search.'#', $replace, $gzip_article_html);
		} // foreach($gzip_article_html_array[0] as $key => $value) {
		return $gzip_article_html;
	}
	/*
		// JSインライン化
		$search = '/<script(.*)src=(("|\')(.*)("|\'))(>|(.*)>)/';
		preg_match_all($search, $gzip_article_html, $gzip_article_html_array);
	//	pre_var_dump($gzip_article_html_array[2]);
	
		foreach($gzip_article_html_array[0] as $key => $value) {
	//pre_var_dump(urlencode($value));
			$search = '/src=("|\')(.*?)("|\')/';
			 preg_match($search, $value, $value_array);
	//		 pre_var_dump($value_array);
			 if(preg_match('/https/' ,$value_array[2])) {
				$js = file_get_contents($value_array[2]);
			}
				else {
					$js = file_get_contents($http.$value_array[2]);
				}
			$search = $gzip_article_html_array[0][$key];
	//		pre_var_dump($search);
			$replace = '<script> 
	'.$js.'';
			$search = preg_replace('/\?/', '\?', $search);
			$gzip_article_html = preg_replace('#'.$search.'#', $replace, $gzip_article_html);
		} // foreach($gzip_article_html_array[0] as $key => $value) {
			echo($gzip_article_html);
	*/
	
	//-----------
	//HTML圧縮
	//-----------
	 public static function html_comp($gzip_article_html) {
		// HTML圧縮
		$search = array(
			'/\>[^\S ]+/s',  // strip whitespaces after tags, except space
			'/[^\S ]+\</s',  // strip whitespaces before tags, except space
			'/(\s)+/s'       // shorten multiple whitespace sequences
		);
		$replace = array(
			'>',
			'<',
			'\\1'
		);
		$gzip_article_html = preg_replace($search, $replace, $gzip_article_html);
		return $gzip_article_html;
	}
	//-------------------
	// ディレクトリ作成
	//-------------------
	 public static function dir_create($directory_path) {
		if( file_exists($directory_path) ) {
		
		}
			else {
				if(mkdir($directory_path, 0755)) {
					chmod($directory_path, 0755);
				}
			}
	}
	//-------------------------
	// マルチディレクトリ作成
	//-------------------------
	 public static function multiple_directory_create($path, $directory_explode) {
		// 絶対パス
		$directory_path = $path;
		foreach($directory_explode as $key => $value) {
			// 絶対パス追加
			$directory_path = $directory_path.$value.'/';
			dir_create($directory_path);
		}
	}
	//-------------------------------------
	// htmlファイルとgzipファイルを生成
	//-------------------------------------
	 public static function html_gzip_create($gzip_article_html, $directory_path) {
		// articleファイル生成
		file_put_contents($directory_path.'index.html', $gzip_article_html);
		$file_org =  'index.html';
		$file_gzip = 'index.html.gz';

		// 元ファイルの内容を読み込む
		$code = file_get_contents($directory_path.$file_org);
		// gzip圧縮処理して同一フォルダにファイルを作成
		$gzip = gzopen($directory_path.$file_gzip ,'w9');
		gzwrite($gzip ,$code);
		gzclose($gzip);
	}
}
