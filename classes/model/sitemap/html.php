<?php
class model_sitemap_html {
	//-------------------------
	//全記事リストHTML生成
	//-------------------------
	public static function article_list_html_create($article_res) {
		foreach($article_res as $key => $value) {
			$li_html_list = $li_html_list.'<li><a href="'.HTTP.'media/article/'.$value['primary_id'].'/">'.$value['title'].'</a></li>';
		}
		return $li_html_list;
	}
	//------------------
	//sitemap.xml生成
	//------------------
	public static function sitemap_xml_create($article_res) {
		foreach($article_res as $key => $value) {
			$url_list = $url_list.'
	<url>
		<loc>'.HTTP.'media/article/'.$value['primary_id'].'/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.7</priority>
	</url>';
		}
	// 合体
	$sitemap_xml = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">

	<url>
		<loc>https://uxseo.jp/</loc>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/media/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/seo-tool/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/contact/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/consultation/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/plan/?p=1</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/plan/?p=2</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/plan/?p=3</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/plan/?p=4</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/sitemap/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.5</priority>
	</url>'.$url_list.'
	<url>
		<loc>https://uxseo.jp/seo-tool/analytics/</loc>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/seo-tool/analytics/signup/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.2</priority>
	</url>
	<url>
		<loc>https://uxseo.jp/seo-tool/analytics/login/</loc>
		<changefreq>weekly</changefreq>
		<priority>0.2</priority>
	</url>

</urlset>';
		return $sitemap_xml;
	}



}