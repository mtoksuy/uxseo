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

/********************
セッションスタート
********************/
session_start();

/***********
DBコンフィグ
***********/
require_once('/var/www/html/cron/uxseo_google_speed_list_config/db.php');
/*******
モデルDB
*******/
require_once('/var/www/html/classes/model/db/basis.php');
$model_db = new model_db();
/**************
モデルsignup
**************/
require_once('/var/www/html/classes/model/signup/basis.php');
$model_signup_basis = new model_signup_basis();

/****************************
メールチェックライブラリ
****************************/
require_once('/var/www/html/classes/library/validateemail/basis.php');
$library_validateemail_basis = new library_validateemail_basis();


/****************************
UXSEO_Search_Analytics
****************************/
//require_once(PATH.'classes/model/uxseo_search_analytics/basis.php');
//$model_uxseo_search_analytics_basis = new model_uxseo_search_analytics_basis();
/************
モデルarticle
************/
require_once('/var/www/html/classes/model/article/basis.php');
require_once('/var/www/html/classes/model/article/html.php');
$model_article_basis = new model_article_basis();
$model_article_html = new model_article_html();
/********************
モデルmedia_post
*********************/
require_once('/var/www/html/classes/model/media/post/basis.php');
$model_media_post_basis = new model_media_post_basis();

/*********
モデルinfo
*********/
//require_once(PATH.'classes/model/info/basis.php');
//$model_info_basis = new model_info_basis();
/**********
モデルlogin
**********/
require_once('/var/www/html/classes/model/login/basis.php');
$model_login_basis = new model_login_basis();
/**************
モデルlogout
**************/
require_once('/var/www/html/classes/model/logout/basis.php');
$model_logout_basis = new model_logout_basis();
/*************
モデルsecurity
*************/
require_once('/var/www/html/classes/library/security/basis.php');
$library_security_basis = new library_security_basis();
/*****************
モデルanalytics
******************/
require_once('/var/www/html/classes/model/analytics/basis.php');
$model_analytics_basis = new model_analytics_basis();
require_once('/var/www/html/classes/model/analytics/html.php');
$model_analytics_html = new model_analytics_html();

/*********
モデルgzip
*********/
require_once('/var/www/html/classes/model/gzip/basis.php');
require_once('/var/www/html/classes/model/gzip/html.php');
$model_gzip_basis = new model_gzip_basis();
$model_gzip_html = new model_gzip_html();

/*********
モデルmail
*********/
require_once('/var/www/html/classes/model/mail/basis.php');
$model_mail_basis = new model_mail_basis();
/*************
モデルsecurity
*************/
//require_once(PATH.'classes/library/security/basis.php');
//$library_security_basis = new library_security_basis();
/*************
モデルsitemap
*************/
require_once('/var/www/html/classes/model/sitemap/basis.php');
require_once('/var/www/html/classes/model/sitemap/html.php');
$model_sitemap_basis = new model_sitemap_basis();
$model_sitemap_html = new model_sitemap_html();
/****************
モデルcron_sales
****************/
require_once('/var/www/html/classes/model/cron/sales/basis.php');
$model_cron_sales_basis = new model_cron_sales_basis();








