<?php 
// エラー回避
error_reporting(0);
ini_set('display_errors', 1);

// エラー表示
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 開発
error_reporting(E_ALL & ~E_NOTICE);

/***************
タイムゾーン指定
***************/
date_default_timezone_set('Asia/Tokyo');
/*******
独自関数
*******/
// プレヴァーダンプ
function pre_var_dump($data = '') {
	echo '<pre>';
	var_dump($data);
	echo '</pre>';
}
/********************************
 * ローカルと本番環境のpathを吸収
 *******************************/
// ローカル環境
if(preg_match('/localhost/',$_SERVER["HTTP_HOST"])) {
	// デフォルト変数生成
	define('HTTP', 'http://localhost/UXSEO/');
	define('PATH', dirname(__FILE__).'/');
	define('INTERNAL_PATH', dirname(__FILE__).'/');
	define('TITLE', 'UXSEO [1億PVから研究した2020年最新のSEO決定版サービス]');
	define('META_KEYWORDS', 'UXSEO, SEO, SEOチェック, SEOツール, SEOキーワード, 格安');
	define('META_DESCRIPTION', '日本トップSEO会社。様々なウェブサイトを魔法のように検索順位を上げます。SEOツール、SEOキーワード、SEOチェックも豊富に取り揃えています。');
	define('TWITTER_ID', '');
}
	// 本番環境
	else {
		// デフォルト変数生成
		define('HTTP', 'https://'.$_SERVER["HTTP_HOST"].'/');
		define('PATH', $_SERVER["DOCUMENT_ROOT"].'/');
		define('INTERNAL_PATH', $_SERVER["DOCUMENT_ROOT"]);
		define('TITLE', 'UXSEO [1億PVから研究した2020年最新のSEO決定版サービス]');
		define('META_KEYWORDS', 'UXSEO, SEO, SEOチェック, SEOツール, SEOキーワード, 格安');
		define('META_DESCRIPTION', '日本トップSEO会社。様々なウェブサイトを魔法のように検索順位を上げます。SEOツール、SEOキーワード、SEOチェックも豊富に取り揃えています。');
		define('TWITTER_ID', '');
	}

//var_dump(HTTP);
/********************
セッションスタート
********************/
session_start();

/***********
DBコンフィグ
***********/
require_once(PATH.'classes/config/db.php');
/*******
モデルDB
*******/
require_once(PATH.'classes/model/db/basis.php');
$model_db = new model_db();

/**************
モデルsignup
**************/
require_once(PATH.'classes/model/signup/basis.php');
$model_signup_basis = new model_signup_basis();

/****************************
メールチェックライブラリ
****************************/
require_once(PATH.'classes/library/validateemail/basis.php');
$library_validateemail_basis = new library_validateemail_basis();


/****************************
UXSEO_Search_Analytics
****************************/
//require_once(PATH.'classes/model/uxseo_search_analytics/basis.php');
//$model_uxseo_search_analytics_basis = new model_uxseo_search_analytics_basis();
/************
モデルarticle
************/
//require_once(PATH.'classes/model/article/basis.php');
//require_once(PATH.'classes/model/article/html.php');
//$model_article_basis = new model_article_basis();
//$model_article_html = new model_article_html();
/*********
モデルinfo
*********/
//require_once(PATH.'classes/model/info/basis.php');
//$model_info_basis = new model_info_basis();
/**********
モデルlogin
**********/
require_once(PATH.'classes/model/login/basis.php');
$model_login_basis = new model_login_basis();
/*************
モデルsecurity
*************/
require_once(PATH.'classes/library/security/basis.php');
$library_security_basis = new library_security_basis();
/*****************
モデルanalytics
******************/
require_once(PATH.'classes/model/analytics/basis.php');
$model_analytics_basis = new model_analytics_basis();

/*********
モデルgzip
*********/
//require_once(PATH.'classes/model/gzip/basis.php');
//require_once(PATH.'classes/model/gzip/html.php');
//$model_gzip_basis = new model_gzip_basis();
//$model_gzip_html = new model_gzip_html();

/*********
モデルmail
*********/
require_once(PATH.'classes/model/mail/basis.php');
$model_mail_basis = new model_mail_basis();
/*************
モデルsecurity
*************/
//require_once(PATH.'classes/library/security/basis.php');
//$library_security_basis = new library_security_basis();






