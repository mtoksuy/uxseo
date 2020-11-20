<?php 
class model_media_post_basis  {
	//----------
	//新規投稿
	//---------
	public static function media_post_add($post) {
		$query = model_db::query("
			INSERT INTO article 
			(
				uxseo_id, 
				title, 
				content
			) 
			VALUES (
				'".$_SESSION['uxseo_id']."',
				'".$post['title']."',
				'".$post['content']."'
			)");
	}
	//--------------
	//記事OGP生成
	//--------------
	public static function media_article_ogp_create($res) {
//		pre_var_dump($res);
		pre_var_dump($res[0]['primary_id']);
		pre_var_dump($res[0]['title']);
		// 基準となるOGP画像
		$im = imagecreatefrompng(PATH.'assets/img/ogp/ogp_0.png');
		// Create some colors 後で使うかも
		$white = imagecolorallocate($im, 255, 255, 255);
		$grey = imagecolorallocate($im, 128, 128, 128);
		$black = imagecolorallocate($im, 0, 0, 0);
		// OGP画像に転写するタイトルテキスト
		$text = $res[0]['title'];
		// [と]を正しくpreg_replaceできるように変換
		$text = preg_replace('/\[/', '顯', $text);
		$text = preg_replace('/\]/', '舷', $text);
		// 16文字で改行
		$text_16 = mb_substr($text, 0, 16);
		$text_last = preg_replace('/'.$text_16.'/', '', $text);
		$text_16 = $text_16.'
';
		$text = $text_16.$text_last;
		
		$text_32 = mb_substr($text, 0, 32);
		$text_last = preg_replace('/'.$text_32.'/', '', $text);
		$text_32 = $text_32.'
';
		$text = $text_32.$text_last;
		
		$text_51 = mb_substr($text, 0, 51);
		$text_last = preg_replace('/'.$text_51.'/', '', $text);
		$text_51 = $text_51.'
';
		$text = $text_51.$text_last;
		// [と]を戻す
		$text = preg_replace('/顯/', '[', $text);
		$text = preg_replace('/舷/', ']', $text);
		// アップロードするディレクトリ
		$uploads_dir = PATH.'assets/img/media/ogp/';
		// 使用するフォント
/*
		$font = '/var/www/html/assets/font/Noto_Serif_KR/NotoSerifKR-ExtraLight.otf';
		$font = '/var/www/html/assets/font/Noto_Serif_KR/NotoSerifKR-SemiBold.otf';
		$font = '/var/www/html/assets/font/MODI_komorebi-gothic_2018_0501/komorebi-gothic-P.ttf';
*/
		$font = '/var/www/html/assets/font/source-han-code-jp-2.011R/OTF/SourceHanCodeJP-Medium.otf';
		
		//image file name
		$name = $uploads_dir.$res[0]['primary_id'].'.png'; //this saves the image inside uploaded_files folder
		// テキスト転写
		imagettftext($im, 36, 0, 250, 370, $black, $font, $text); // 画像、フォントサイズ、なんか、横、縦
		// png作成
		imagepng($im,$name,1);
		// GD 削除
		imagedestroy($im);
	}
}
