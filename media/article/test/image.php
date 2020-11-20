<?php
$im = imagecreatefrompng('/var/www/html/assets/img/ogp/ogp_0.png');

// Create some colors
$white = imagecolorallocate($im, 255, 255, 255);
$grey = imagecolorallocate($im, 128, 128, 128);
$black = imagecolorallocate($im, 0, 0, 0);
//imagefilledrectangle($im, 10000, 10000, 10000, 10000, $white);


// The text to draw
//$text = 'John...';
$text = 'そのターゲットキーワードは正しい？正しいキーワードでパイの大きさを確認する方法'; // 16文字で折り返したい
$text = '物体検出のDeepLearning読むべき論文7選とポイントまとめ【EfficientDetまでの道筋】'; // 16文字で折り返したい
$text = 'SEO検索順位ツール「UXSEOアナリティクス」の使い方'; // 16文字で折り返したい
$text = 'PHP文章を解析して単語ごとに分解する（形態素解析）';
$text = 'UXSEO [3億PVから研究した2020年最新のSEO決定版サービス]';
$text = '';
$text = 'UXSEOメディアはじめます';
$text = '1番効果があって即効性のあるSEO対策とは？';
$text = 'そのターゲットキーワードは正しい？正しいキーワードでパイの大きさを確認する方法';
$text = 'SEO検索順位ツール「UXSEOアナリティクス」の使い方';





$text = preg_replace('/\[/', '顯', $text);
$text = preg_replace('/\]/', '舷', $text);

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

$text = preg_replace('/顯/', '[', $text);
$text = preg_replace('/舷/', ']', $text);

$uploads_dir = '/var/www/html/assets/img/media/ogp/';
// Replace path by your own font path
$font = 'verdana.ttf';
$font = 'arial.ttf';
// 使用するフォント名を指定します (拡張子 .ttf がないことに注意)
$font = 'SomeFont';
$font = '/var/www/html/assets/font/Noto_Serif_KR/NotoSerifKR-ExtraLight.otf';
$font = '/var/www/html/assets/font/Noto_Serif_KR/NotoSerifKR-SemiBold.otf';
$font = '/var/www/html/assets/font/MODI_komorebi-gothic_2018_0501/komorebi-gothic-P.ttf';
$font = '/var/www/html/assets/font/source-han-code-jp-2.011R/OTF/SourceHanCodeJP-Medium.otf';

//image file name
$name = $uploads_dir.'4.png'; //this saves the image inside uploaded_files folder
var_dump($name);


// Add the text
//imagettftext($im, 36, 0, 250, 370, $black, $font, $text); // 画像、フォントサイズ、なんか、横、縦
imagettftext($im, 36, 0, 250, 370, $black, $font, $text); // 画像、フォントサイズ、なんか、横、縦

// Using imagepng() results in clearer text compared with imagejpeg()

//var_dump($name);

// png作成
imagepng($im,$name,1);
imagedestroy($im);


?>


<img src="https://uxseo.jp/assets/img/media/ogp/4.png">




